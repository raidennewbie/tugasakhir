<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\jadwal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $siswaId, $jadwal_id)
    {
        $siswa = Siswa::findOrFail($siswaId);
        $jadwal = Jadwal::findOrFail($jadwal_id);
    
        $dataAbsensi = Absensi::where('siswa_id', $siswaId)
        ->where('jadwal_id', $jadwal_id)
        ->orderBy('created_at', 'asc')
        ->get();
    
    
        return view('detail_absensi', compact('siswa', 'dataAbsensi', 'jadwal'));
    }
    

    public function gurud(Request $request, $siswaId, $jadwal_id)
    {
        $siswa = Siswa::findOrFail($siswaId);
        $jadwal = Jadwal::findOrFail($jadwal_id);
    
        $dataAbsensi = Absensi::where('siswa_id', $siswaId)
        ->where('jadwal_id', $jadwal_id)
        ->orderBy('created_at', 'asc')
        ->get();
    
    
        return view('detail_absensi', compact('siswa', 'dataAbsensi', 'jadwal'));
    }

    //     return view('detail_absensi');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(absensi $absensi)
    {
        //
    }
}
