<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruBerandaController extends Controller
{
    public function index()
    {
        $data ['active'] = 'guru/beranda';
        return view('guru.guru_beranda');
    }
}
