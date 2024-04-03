<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Http\Requests\StorelaporanRequest;
use App\Http\Requests\UpdatelaporanRequest;
use App\Models\absensi;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\Tahunajar;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            $request = request();
            if (
                $request->has('tanggal_awal') && 
                $request->has('tanggal_akhir') && 
                $request->has('user_id') && 
                $request->has('mapel_id') && 
                $request->has('kelas_id') && 
                $request->has('semester_id') && 
                $request->has('tahunajar_id')) 
                {
                $tanggal_awal = $request->tanggal_awal;
                $tanggal_akhir = $request->tanggal_akhir;
                $user_id = $request->user_id;
                $mapel_id = $request->mapel_id;
                $kelas_id = $request->kelas_id;
                $semester_id = $request->semester_id;
                $tahunajar_id = $request->tahunajar_id;
                //
                $query = Absensi::select('siswa_id', 'user_id', 'mapel_id', 'kelas_id', 'semester_id', 'tahunajar_id', 'jadwal_id', 
                DB::raw('COUNT(CASE WHEN status = "H" THEN 1 ELSE NULL END) AS hadir_count'), 
                DB::raw('COUNT(CASE WHEN status = "I" THEN 1 ELSE NULL END) AS izin_count'), 
                DB::raw('COUNT(CASE WHEN status = "A" THEN 1 ELSE NULL END) AS alpa_count'))
                    ->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
                    ->where('user_id', $request->user_id)
                    ->where('mapel_id', $request->mapel_id)
                    ->where('kelas_id', $request->kelas_id)
                    ->where('semester_id', $request->semester_id)
                    ->where('tahunajar_id', $request->tahunajar_id)
                    ->groupBy('siswa_id', 'user_id', 'mapel_id', 'kelas_id', 'semester_id', 'tahunajar_id', 'jadwal_id');
                //
                $data['absensi'] = $query->get();
                $data['user_id'] = $user_id;
                $data['mapel_id'] = $mapel_id;
                $data['kelas_id'] = $kelas_id;
                $data['semester_id'] = $semester_id;
                $data['tahunajar_id'] = $tahunajar_id;
                //

                if ($data['absensi']->isEmpty()) {
                    return 'Data tidak ditemukan';
                }
                
                $user = User::find($user_id);
                $data['user_name'] = $user ? $user->name : 'User Tidak Ditemukan';

                $mapel = Mapel::find($mapel_id);
                $data['mapel_name'] = $mapel ? $mapel->name : 'Mapel Tidak Ditemukan';

                $kelas = Kelas::find($kelas_id);
                $data['kelas_name'] = $kelas ? $kelas->name : 'Kelas Tidak Ditemukan';

                $semester = Semester::find($semester_id);
                $data['semester_name'] = $semester ? $semester->name : 'Semester Tidak Ditemukan';

                $tahunajar = Tahunajar::find($tahunajar_id);
                $data['tahunajar_name'] = $tahunajar ? $tahunajar->tahun_ajaran : 'Kelas Tidak Ditemukan';

                return view('laporan.laporan_index', $data);
            } else {
                //
                $user = User::where('role', 'guru')->orderBy('name', 'asc')->get();
                $mapel = Mapel::orderBy('name', 'asc')->get();
                $kelas = Kelas::orderBy('name', 'asc')->get();
                $semester = Semester::all();
                $tahun = Tahunajar::all();
                return view('laporan.laporan_form', compact('user', 'mapel', 'kelas', 'semester', 'tahun'));
            }
        } elseif ($role === 'guru') {
            $request = request();
            if 
            (
                $request->has('tanggal_awal') && 
                $request->has('tanggal_akhir') && 
                $request->has('user_id') && 
                $request->has('mapel_id') && 
                $request->has('kelas_id') && 
                $request->has('semester_id') && 
                $request->has('tahunajar_id')) 
                {
                $tanggal_awal = $request->tanggal_awal;
                $tanggal_akhir = $request->tanggal_akhir;
                $user_id = $request->user_id;
                $mapel_id = $request->mapel_id;
                $kelas_id = $request->kelas_id;
                $semester_id = $request->semester_id;
                $tahunajar_id = $request->tahunajar_id;
                //
                $query = Absensi::select('siswa_id', 'user_id', 'mapel_id', 'kelas_id', 'semester_id', 'tahunajar_id', 'jadwal_id', 
                DB::raw('COUNT(CASE WHEN status = "H" THEN 1 ELSE NULL END) AS hadir_count'), 
                DB::raw('COUNT(CASE WHEN status = "I" THEN 1 ELSE NULL END) AS izin_count'), 
                DB::raw('COUNT(CASE WHEN status = "A" THEN 1 ELSE NULL END) AS alpa_count'))
                    ->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
                    ->where('user_id', $request->user_id)
                    ->where('mapel_id', $request->mapel_id)
                    ->where('kelas_id', $request->kelas_id)
                    ->where('semester_id', $request->semester_id)
                    ->where('tahunajar_id', $request->tahunajar_id)
                    ->groupBy('siswa_id', 'user_id', 'mapel_id', 'kelas_id', 'semester_id', 'tahunajar_id', 'jadwal_id');
                //

              
                $data['absensi'] = $query->get();
                $data['user_id'] = $user_id;
                $data['mapel_id'] = $mapel_id;
                $data['kelas_id'] = $kelas_id;
                $data['semester_id'] = $semester_id;
                $data['tahunajar_id'] = $tahunajar_id;

                if ($data['absensi']->isEmpty()) {
                    return 'Data tidak ditemukan';
                }

                $user = User::find($user_id);
                $data['user_name'] = $user ? $user->name : 'User Tidak Ditemukan';

                $mapel = Mapel::find($mapel_id);
                $data['mapel_name'] = $mapel ? $mapel->name : 'Mapel Tidak Ditemukan';

                $kelas = Kelas::find($kelas_id);
                $data['kelas_name'] = $kelas ? $kelas->name : 'Kelas Tidak Ditemukan';

                $semester = Semester::find($semester_id);
                $data['semester_name'] = $semester ? $semester->name : 'Semester Tidak Ditemukan';

                $tahunajar = Tahunajar::find($tahunajar_id);
                $data['tahunajar_name'] = $tahunajar ? $tahunajar->tahun_ajaran : 'Kelas Tidak Ditemukan';

                return view('guru.laporan_index', $data);
            } else {
                //
                $user = User::where('role', 'guru')->orderBy('name', 'asc')->get();
                $mapel = Mapel::orderBy('name', 'asc')->get();
                $kelas = Kelas::orderBy('name', 'asc')->get();
                $semester = Semester::all();
                $tahun = Tahunajar::all();
                return view('guru.laporan_form', compact('user', 'mapel', 'kelas', 'semester', 'tahun'));
            }
        }
    }


    //
    public function harian(Request $request)
    {
        
            if (
                $request->has('tanggal_awal') && 
                $request->has('tanggal_akhir') && 
                $request->has('user_id') && 
                $request->has('mapel_id') && 
                $request->has('kelas_id') && 
                $request->has('semester_id') && 
                $request->has('tahunajar_id')) 
                {
                $tanggal_awal = $request->tanggal_awal;
                $tanggal_akhir = $request->tanggal_akhir;
                $user_id = $request->user_id;
                $mapel_id = $request->mapel_id;
                $kelas_id = $request->kelas_id;
                $semester_id = $request->semester_id;
                $tahunajar_id = $request->tahunajar_id;
                //
                

                $absensi = Absensi::where('user_id', $user_id)
                ->where('mapel_id', $mapel_id)
                ->where('kelas_id', $kelas_id)
                ->where('semester_id', $semester_id)
                ->where('tahunajar_id', $tahunajar_id)
                ->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
                ->get();
                // $absensi = Absensi::all();
                $absensiGroupedByDate = $absensi->groupBy(function ($item) {
                    return $item->created_at->format('Y-m-d');
                });


                //
                $user = User::find($user_id);
                $user_name = $user ? $user->name : 'User Tidak Ditemukan';

                $mapel = Mapel::find($mapel_id);
                $mapel_name = $mapel ? $mapel->name : 'Mapel Tidak Ditemukan';

                $kelas = Kelas::find($kelas_id);
                $kelas_name = $kelas ? $kelas->name : 'Kelas Tidak Ditemukan';

                $semester = Semester::find($semester_id);
                $semester_name = $semester ? $semester->name : 'Semester Tidak Ditemukan';

                $tahunajar = Tahunajar::find($tahunajar_id);
                $tahunajar_name = $tahunajar ? $tahunajar->tahun_ajaran : 'Kelas Tidak Ditemukan';


                if ($absensi->isEmpty()) {
                    return 'Data tidak ditemukan';
                }

                return view('laporan.harian_index', [
                    'tanggal_awal' => $tanggal_awal,
                    'tanggal_akhir' => $tanggal_akhir,
                    'user_name' => $user_name,
                    'kelas_name' => $kelas_name,
                    'mapel_name' => $mapel_name,
                    'semester_name' => $semester_name,
                    'tahunajar_name' => $tahunajar_name,
                    'absensi' => $absensi,
                    'absensiGroupedByDate' => $absensiGroupedByDate,
                    
                ]);
        } else {
            $user = User::where('role', 'guru')->orderBy('name', 'asc')->get();
            $mapel = Mapel::orderBy('name', 'asc')->get();
            $kelas = Kelas::orderBy('name', 'asc')->get();
            $semester = Semester::all();
            $tahun = Tahunajar::all();
            return view('laporan.harian_form', compact('user', 'mapel', 'kelas', 'semester', 'tahun'));
        }
    
    } 
    
    public function harianguru(Request $request)
    {
        
            if (
                $request->has('tanggal_awal') && 
                $request->has('tanggal_akhir') && 
                $request->has('user_id') && 
                $request->has('mapel_id') && 
                $request->has('kelas_id') && 
                $request->has('semester_id') && 
                $request->has('tahunajar_id')) 
                {
                $tanggal_awal = $request->tanggal_awal;
                $tanggal_akhir = $request->tanggal_akhir;
                $user_id = $request->user_id;
                $mapel_id = $request->mapel_id;
                $kelas_id = $request->kelas_id;
                $semester_id = $request->semester_id;
                $tahunajar_id = $request->tahunajar_id;
                //
                

                $absensi = Absensi::where('user_id', $user_id)
                ->where('mapel_id', $mapel_id)
                ->where('kelas_id', $kelas_id)
                ->where('semester_id', $semester_id)
                ->where('tahunajar_id', $tahunajar_id)
                ->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
                ->get();
                // $absensi = Absensi::all();
                $absensiGroupedByDate = $absensi->groupBy(function ($item) {
                    return $item->created_at->format('Y-m-d');
                });


                //
                $user = User::find($user_id);
                $user_name = $user ? $user->name : 'User Tidak Ditemukan';

                $mapel = Mapel::find($mapel_id);
                $mapel_name = $mapel ? $mapel->name : 'Mapel Tidak Ditemukan';

                $kelas = Kelas::find($kelas_id);
                $kelas_name = $kelas ? $kelas->name : 'Kelas Tidak Ditemukan';

                $semester = Semester::find($semester_id);
                $semester_name = $semester ? $semester->name : 'Semester Tidak Ditemukan';

                $tahunajar = Tahunajar::find($tahunajar_id);
                $tahunajar_name = $tahunajar ? $tahunajar->tahun_ajaran : 'Kelas Tidak Ditemukan';


                
                if ($absensi->isEmpty()) {
                    return 'Data tidak ditemukan';
                }

                return view('guru.harian_index', [
                    'tanggal_awal' => $tanggal_awal,
                    'tanggal_akhir' => $tanggal_akhir,
                    'user_name' => $user_name,
                    'kelas_name' => $kelas_name,
                    'mapel_name' => $mapel_name,
                    'semester_name' => $semester_name,
                    'tahunajar_name' => $tahunajar_name,
                    'absensi' => $absensi,
                    'absensiGroupedByDate' => $absensiGroupedByDate,
                    
                ]);
        } else {
            $user = User::where('role', 'guru')->orderBy('name', 'asc')->get();
            $mapel = Mapel::orderBy('name', 'asc')->get();
            $kelas = Kelas::orderBy('name', 'asc')->get();
            $semester = Semester::all();
            $tahun = Tahunajar::all();
            return view('guru.harian_form', compact('user', 'mapel', 'kelas', 'semester', 'tahun'));
        }
    
    } 

    //
    

    public function laporan()
    {
        return view('laporan.semua');
        // return view('laporan.harian_form');
    }

    public function laporanguru()
    {
        return view('guru.semua');
        // return view('laporan.harian_form');
    }

    public function uhuyy()
    {
        
        
        $absensi = Absensi::all();
        $absensiGroupedByDate = $absensi->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
        });
        return view('laporan.harian_index', compact('absensi', 'absensiGroupedByDate'));
    }

    // $absensi = Absensi::all();
    // // Mengelompokkan data absensi berdasarkan tanggal
    // $absensiGroupedByDate = $absensi->groupBy(function ($item) {
    //     return $item->created_at->format('Y-m-d');
    // });
    // return view('laporan.harian_index', compact('absensi', 'absensiGroupedByDate'));

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
