<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use App\Models\jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\Tahunajar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $role = Auth::user()->role;
    if ($role === 'guru') {
        $userId = Auth::id();

        $query = $request->input('query');
        if ($query) {
            $model = absensi::search($query)->where('user_id', $userId)->paginate(1000);
        } else {
            $model = absensi::with('user', 'kelas', 'mapel', 'siswa', 'semester', 'tahunajar')->where('user_id', $userId)->get();
        }
        return view('guru.data_absensi', compact('model', 'query'));
    }
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
            return view('guru.absensi', ['siswa' => $siswa], compact('jadwal'));
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
            'status.*' => [
                'required',
                Rule::in(['hadir', 'izin', 'alpa']), 
            ],
        ]);
        $jadwal = jadwal::findOrFail($request->jadwal_id);
        $siswaIds = $request->siswa_id;

        if (!$siswaIds || count($siswaIds) === 0) {
            return redirect()
                ->back()
                ->with('error', 'Status Siswa Masih Kosong');
        }

        foreach ($siswaIds as $siswaId => $status) {
            if (empty($status) || empty($siswaId)) {
                return redirect()
                    ->back()
                    ->with('error', 'Status untuk salah satu siswa masih kosong');
            }

            Absensi::where('jadwal_id', $jadwal->id)
            ->where('created_at', date('Y-m-d'))
            ->where('mapel_id', $jadwal->mapel_id)
            ->where('semester_id', $jadwal->semester_id)
            ->where('tahunajar_id', $jadwal->tahunajar_id)
            ->where('kelas_id', $jadwal->kelas_id)
            ->where('siswa_id', $siswaId)->delete();

            Absensi::create([
                'user_id' => Auth::id(),
                'created_at' => date('Y-m-d'),
                'jadwal_id' => $jadwal->id,
                'siswa_id' => $siswaId,
                'mapel_id' => $jadwal->mapel_id,
                'kelas_id' => $jadwal->kelas_id,
                'semester_id' => $jadwal->semester_id,
                'tahunajar_id' => $jadwal->tahunajar_id,
                'status' => $status,
            ]);
        }

        return redirect('/guru/jadwal')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Absensi::findOrFail($id);
        $data['model'] = $model;

        return view('guru.edit_absensi', $data);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $model = Absensi::findOrFail($id);

        $requestData = $request->validate([
            'status' => 'required',
        ]);

       
        $status = $requestData['status'];

        $model->status = $status;

        $model->save();

        return redirect('/guru/absensi')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = absensi::findorfail($id);
        $model->delete();
        return back()->with('delete', 'Data Berhasil Dihapus');
    }
}
