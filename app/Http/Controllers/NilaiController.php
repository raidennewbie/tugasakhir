<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\Nilai;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        $role === 'guru';
            $userId = Auth::id();
            $jadwal = jadwal::findOrFail($request->jadwal_id);
    
                $model = Nilai::with('user', 'kelas', 'mapel', 'siswa', 'semester', 'tahunajar')->where('user_id', $userId)->get();
            
            return view('guru.nilai_index', compact('model','jadwal'));
    }
    


    public function nilaii()
    {
        $role = Auth::user()->role;

        $role === 'guru';
            $userId = Auth::id(); // ID pengguna yang terautentikasi
            $model = jadwal::with('user','kelas','mapel','semester','tahunajar')->where('user_id', $userId)->latest()->paginate(15);
           
            return view('guru.nilai', compact('model'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $kelasId = $request->input('kelas_id');

        if ($kelasId) {
            $siswa = Siswa::where('kelas_id', $kelasId)->get();
            $jadwal = jadwal::findOrFail($request->jadwal_id);
            // Lakukan operasi lain dengan siswa dari kelas tertentu
            return view('guru.nilai_form', ['siswa' => $siswa], compact('jadwal'));
        } else {
            // Jika kelas_id tidak tersedia, tampilkan semua siswa atau pesan lainnya
            // ...
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id.*' => 'required', 
            'nilai.*' => 'integer',
        ]);

     
    
        $jadwal = Jadwal::findOrFail($request->jadwal_id);
        $siswaIds = $request->siswa_id;

    

            foreach ($siswaIds as $siswa_id => $nilai) {

                Nilai::where('jadwal_id', $jadwal->id)
               
                ->where('mapel_id', $jadwal->mapel_id)
                ->where('semester_id', $jadwal->semester_id)
                ->where('tahunajar_id', $jadwal->tahunajar_id)
                ->where('kelas_id', $jadwal->kelas_id)
                ->where('siswa_id', $siswa_id)
                ->delete();
          
            Nilai::create([
                'user_id' => Auth::id(),
                'jadwal_id' => $jadwal->id,
                'siswa_id' => $siswa_id,
                'mapel_id' => $jadwal->mapel_id,
                'kelas_id' => $jadwal->kelas_id,
                'semester_id' => $jadwal->semester_id,
                'tahunajar_id' => $jadwal->tahunajar_id,
                'nilai' => $nilai,
            ]);
        }
        return redirect('/guru/nilaii')->with('success', 'Data Berhasil Disimpan');
    }
    

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Nilai::findOrFail($id);
        $data['model'] = $model;

        return view('guru.nilai_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = Nilai::findOrFail($id);

        $requestData = $request->validate([
            'nilai' => 'required',
        ]);

       
        $nilai = $requestData['nilai'];

        $model->nilai = $nilai;

        $model->save();

        return redirect('guru/nilaii')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Nilai::findorfail($id);
        $model->delete();
        return back()->with('delete', 'Data Berhasil Dihapus');
    }

    public function nilaisiswa(Request $request)
    {
        
            if (
                $request->has('siswa_id')) 
                {
                $siswa_id = $request->siswa_id;
               
                //
                $query = Nilai::where('siswa_id', $request->siswa_id);
                $absensi = $query->get();
                //
                if ($absensi->isEmpty()) {
                    return 'Data tidak ditemukan';
                }

                $siswa = Siswa::find($siswa_id);
                $siswa_name = $siswa ? $siswa->name : 'User Tidak Ditemukan';

                return view('laporan.nilai_index', [
                    'siswa_name' => $siswa_name,
                    'absensi' => $absensi,
                    ]);
        } else {
            $siswa = Siswa::orderBy('name', 'asc')->get();
            return view('laporan.nilai_form', compact('siswa'));
        }
    } 
}
