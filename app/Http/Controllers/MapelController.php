<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Http\Requests\StoreMapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        $data['active'] = 'admin/mapel';
    
        if ($query) {
            $model = Mapel::search($query)->paginate(10);
        } else {
            $model = Mapel::latest()->paginate(10);
        }
    
        return view('mapel.mapel_index', compact('model', 'query', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel.mapel_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|min:3|unique:mapels,name',
        ]);
        $user = Mapel::create($requestData);
       return redirect('/admin/mapel')->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Mapel::findorfail($id);
        $data ['model'] = $model;
        return view('mapel.mapel_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = Mapel::findOrFail($id);
    
        $requestData = $request->validate([
            'name' => 'required|min:3|unique:mapels,name,' . $model->id,
        ]);
    
        $model->name = $requestData['name'];
    
        $model->save();
        return redirect('/admin/mapel')->with('update', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Mapel::findorfail($id);       
        $model->delete();
        return back()->with('delete','Data Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }
}
