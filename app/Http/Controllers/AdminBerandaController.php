<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBerandaController extends Controller
{
    public function index()
    {
        $data ['active'] = 'admin/beranda';
        return view('admin.admin_beranda');
    }
}
