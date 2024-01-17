<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
   
        $data ['model'] = Siswa::with('kelas')->latest()->get();

        if ($query) {
            $model = Siswa::search($query)->paginate(10);
        } else {
            $model = Siswa::latest()->paginate(10);
        }
       
        return view('siswa.siswa_index', compact('model', 'query', 'data') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::orderBy('name', 'asc')->get();

        return view('siswa.siswa_form', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|min:3',
            'nisn' => 'required|unique:siswas,nisn',
            'nik' => 'required|unique:siswas,nik',
            'kelas_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'required',
        ]);

        $user = Siswa::create($requestData);
       return redirect('/admin/siswa')->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Siswa::findorfail($id);
        $data ['kelas'] = Kelas::all();
        $data ['model'] = $model;
        return view('siswa.siswa_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = Siswa::findOrFail($id);

        $requestData = $request->validate([
            'name' => 'required|min:3',
            'nisn' => 'required|unique:siswas,nisn,' . $model->id,
            'nik' => 'required|unique:siswas,nik,' . $model->id,
            'kelas_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'required',
        ]);
        // Jika email yang diinputkan sama dengan email yang sudah ada, gunakan email yang sudah ada
        // $requestData['email'] = ($requestData['email'] === $model->email) ? $model->email : $requestData['email'];
    
        $model->name = $requestData['name'];
        $model->nisn = $requestData['nisn'];
        $model->nik = $request['nik'];
        $model->kelas_id = $request['kelas_id'];
        $model->tempat_lahir = $request['tempat_lahir'];
        $model->tanggal_lahir = $request['tanggal_lahir'];
        $model->jenkel = $request['jenkel'];
        $model->alamat = $request['alamat'];
        $model->nama_ayah = $request['nama_ayah'];
        $model->nama_ibu = $request['nama_ibu'];
        $model->nama_wali = $request['nama_wali'];
      
        $model->save();
        return redirect('/admin/siswa')->with('update', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Siswa::findorfail($id);       
        $model->delete();
        return back()->with('delete','Data Berhasil Dihapus');
    }

    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $data  ['siswa'] = Siswa::find($id);
      
    
        return view('siswa.siswa_show', $data );
    }
    
}
