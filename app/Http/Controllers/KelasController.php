<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data['active'] = 'admin/kelas';
    
        if ($query) {
            $model = Kelas::search($query)->paginate(10);
        } else {
            $model = Kelas::latest()->paginate(10);
        }
    
        return view('kelas.kelas_index', compact('model', 'query', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.kelas_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|min:3|unique:kelas,name',
        ]);
        $user = Kelas::create($requestData);
       return redirect('/admin/kelas')->with('success', 'Data Berhasil Disimpan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Kelas::findorfail($id);
        $data ['model'] = $model;
        return view('kelas.kelas_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $model = Kelas::findOrFail($id);

    $requestData = $request->validate([
        'name' => 'required|min:3|unique:kelas,name,' . $model->id,
    ]);

    $model->name = $requestData['name'];

    $model->save();
    return redirect('/admin/kelas')->with('update', 'Data Berhasil Diedit');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Kelas::findorfail($id);       
        $model->delete();
        return back()->with('delete','Data Berhasil Dihapus');
    }
        /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }
}
