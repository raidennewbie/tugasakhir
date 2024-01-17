<?php

namespace App\Http\Controllers;

use App\Models\Tahunajar;
use App\Http\Requests\StoreTahunajarRequest;
use App\Http\Requests\UpdateTahunajarRequest;
use Illuminate\Http\Request;

class TahunajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $query = $request->input('query');

        $data['active'] = 'admin/tahunajar';
    
        // if ($query) {
        //     $model = Kelas::search($query)->paginate(10);
        // } else {
        //     $model = Kelas::latest()->paginate(10);
        // }
        $model = Tahunajar::latest()->paginate(10);
    
        return view('tahun.tahun_index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun.tahun_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tahun_ajaran' => 'required|min:3|unique:tahunajars,tahun_ajaran',
        ]);
        $user = Tahunajar::create($requestData);
       return redirect('/admin/tahunajar')->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Tahunajar::findorfail($id);
        $data ['model'] = $model;
        return view('tahun.tahun_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = Tahunajar::findOrFail($id);
    
        $requestData = $request->validate([
            'tahun_ajaran' => 'required|min:3|unique:tahunajars,tahun_ajaran,' . $model->id,
        ]);
    
        $model->tahun_ajaran = $requestData['tahun_ajaran'];
    
        $model->save();
        return redirect('/admin/tahunajar')->with('update', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Tahunajar::findorfail($id);       
        $model->delete();
        return back()->with('delete','Data Berhasil Dihapus');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Tahunajar $tahunajar)
    {
        //
    }
}
