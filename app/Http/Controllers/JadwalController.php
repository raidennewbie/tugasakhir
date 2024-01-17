<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Tahunajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $role = Auth::user()->role; // Mendapatkan peran pengguna yang terautentikasi

    if ($role === 'admin') {
        $model = Jadwal::with('user','kelas','mapel','semester','tahunajar')->latest()->paginate(15);
        //cari
        $query = $request->input('query'); // Mendapatkan input pencarian dari query string
        if ($query) {
            $model = jadwal::search($query)->paginate(10);
        } else {
            $model = jadwal::latest()->paginate(10);
        }

        return view('jadwal.jadwal_index', compact('model','query')); // Semua jadwal untuk admin
    } elseif ($role === 'guru') {
        $userId = Auth::id(); // ID pengguna yang terautentikasi
        $model = Jadwal::with('user','kelas','mapel','semester','tahunajar')->where('user_id', $userId)->latest()->paginate(15); // Jadwal hanya untuk pengguna yang login sebagai guru
        return view('guru.jadwal_index', compact('model'));
}
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $user = User::where('role', 'guru')->orderBy('name', 'asc')->get();
        $mapel = Mapel::orderBy('name', 'asc')->get();
        $kelas = Kelas::orderBy('name', 'asc')->get();
        $semester = Semester::all();
        $tahun = Tahunajar::all();

        return view('jadwal.jadwal_form', compact('user','mapel','kelas','semester','tahun'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'user_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'tahunajar_id' => 'required',
            'hari' => 'required',
            'jam_masuk' => 'required',
            'jam_selesai' => 'required',
        ]);
        $user = jadwal::create($requestData);
       return redirect('/admin/jadwal')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $model = jadwal::findorfail($id);
        $data ['user'] = User::all();
        $data ['kelas'] = Kelas::all();
        $data ['mapel'] = Mapel::all();
        $data ['semester'] = Semester::all();
        $data ['tahun'] = Tahunajar::all();
        $data ['model'] = $model;
        return view('jadwal.jadwal_edit', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = jadwal::findOrFail($id);

        $requestData = $request->validate([
            'user_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'tahunajar_id' => 'required',
            'hari' => 'required',
            'jam_masuk' => 'required',
            'jam_selesai' => 'required',
        ]);
        
        $model->user_id = $requestData['user_id'];
        $model->kelas_id = $requestData['kelas_id'];
        $model->mapel_id = $request['mapel_id'];
        $model->semester_id = $request['semester_id'];
        $model->tahunajar_id = $request['tahunajar_id'];
        $model->hari = $request['hari'];
        $model->jam_masuk = $request['jam_masuk'];
        $model->jam_selesai = $request['jam_selesai'];
  
        $model->save();
        return redirect('/admin/jadwal')->with('update', 'Data Berhasil Diedit');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = jadwal::findorfail($id);       
        $model->delete();
        return back()->with('delete','Data Berhasil Dihapus');
    }
}
