<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBerandaController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahStudent = Siswa::count();
        $jumlahSubject = Mapel::count();
        $jumlahClass = Kelas::count();
        $jumlahJadwal = jadwal::count();
        
        $data = [
            'jumlahPengguna' => $jumlahUser,
            'jumlahSiswa' => $jumlahStudent,
            'jumlahMapel' => $jumlahSubject,
            'jumlahKelas' => $jumlahClass,
            'jumlahjadwal' => $jumlahJadwal
        ];
    
    
        return view('admin.admin_beranda', $data);
    }
    
}
