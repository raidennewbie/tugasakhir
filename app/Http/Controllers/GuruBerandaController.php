<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruBerandaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jumlahJadwal = $user->jadwal->count();

        $data = [
            'jumlahjadwal' => $jumlahJadwal,
        ];
        return view('guru.guru_beranda', $data);
    }
}
