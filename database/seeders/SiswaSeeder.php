<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //11 MIA
        Siswa::create([
            'name' => 'RIA FEBRIATI',
            'nisn' => '3066313149',
            'nik' => '1505024102060005',
            'kelas_id' => 1,
            'tempat_lahir' => 'BEREMBANG',
            'tanggal_lahir' => '2006-02-01',  
            'jenkel' => 'perempuan',
            'alamat' => 'RT 08 DESA BEREMBANG BEREMBANG, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'SUPRYANTO',
            'nama_ibu' => 'NGATINA',
            'nama_wali' => 'SUPRYANTO',
        ]);

        Siswa::create([
            'name' => 'SELO MAITA',
            'nisn' => '0065745133',
            'nik' => '1505016209060001',
            'kelas_id' => 1,
            'tempat_lahir' => 'MUARO JAMBI',
            'tanggal_lahir' => '2006-09-22',
            'jenkel' => 'perempuan',
            'alamat' => 'RT 06 PENYENGAT OLAK PENYENGAT OLAK, JAMBI LUAR KOTA, MUARO JAMBI, JAMBI, 36361, 36361',
            'nama_ayah' => 'SYAIFUL BAHRI',
            'nama_ibu' => 'LAMSI',
            'nama_wali' => 'SYAIFUL BAHRI',
        ]);

        Siswa::create([
            'name' => 'NATARA BILA CARELA',
            'nisn' => '0064799336',
            'nik' => '1505023004063001',
            'kelas_id' => 1,
            'tempat_lahir' => 'MUARO JAMBI',
            'tanggal_lahir' => '2006-09-06',
            'jenkel' => 'perempuan',
            'alamat' => 'Jl. K.H.Ibrahim PASIR PANJANG, DANAU TELUK, KOTA JAMBI, JAMBI, 36261, 36261',
            'nama_ayah' => 'DEBBI SYARGAWI',
            'nama_ibu' => 'AINA',
            'nama_wali' => 'DEBBI SYARGAWI',
        ]);

        Siswa::create([
            'name' => 'ZHOFRAN DWI JAYA',
            'nisn' => '0058653493',
            'nik' => '1505022612051004',
            'kelas_id' => 1,
            'tempat_lahir' => 'JAMBI',
            'tanggal_lahir' => '2005-12-27',
            'jenkel' => 'laki-laki',
            'alamat' => 'Rt.03 Desa Bukit Baling BUKIT BALING, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'Kusuma Wijaya',
            'nama_ibu' => 'SITI RAHMA',
            'nama_wali' => 'Kusuma Wijaya',
        ]);

        Siswa::create([
            'name' => 'M. NABIL IRWANA',
            'nisn' => '0069894583',
            'nik' => '1505023008960001',
            'kelas_id' => 1,
            'tempat_lahir' => 'SENGETI',
            'tanggal_lahir' => '2006-04-30',
            'jenkel' => 'laki-laki',
            'alamat' => 'RT 05 SENGETI SENGETI, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'IRWANA',
            'nama_ibu' => 'NORA YOSEFA',
            'nama_wali' => 'NORA YOSEFA',
        ]);

         //11 iis 1
        Siswa::create([
            'name' => 'HAZRA FITRIYALOKA',
            'nisn' => '0064291300',
            'nik' => '1505025702009002',
            'kelas_id' => 2,
            'tempat_lahir' => 'RANTAU MAJO',
            'tanggal_lahir' => '2006-02-17',
            'jenkel' => 'perempuan',
            'alamat' => 'rt 08 RANTAU MAJO, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'pahrurozi',
            'nama_ibu' => 'HOTIJAH',
            'nama_wali' => 'pahrurozi',
        ]);

        Siswa::create([
            'name' => 'MELISA AULIA SIRLI',
            'nisn' => '0068347232',
            'nik' => '1505025707760045',
            'kelas_id' => 2,
            'tempat_lahir' => 'BEREMBANG',
            'tanggal_lahir' => '2006-05-29',
            'jenkel' => 'perempuan',
            'alamat' => 'RT 13 SENGETI, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'SUANDI',
            'nama_ibu' => 'ERMADIA',
            'nama_wali' => 'SUANDI',
        ]);

        Siswa::create([
            'name' => 'NURNABILA ZARIYANTI',
            'nisn' => '0062040321',
            'nik' => '1504456012040019',
            'kelas_id' => 2,
            'tempat_lahir' => 'SENGETI',
            'tanggal_lahir' => '2006-12-20',
            'jenkel' => 'perempuan',
            'alamat' => 'Desa Pulau Raman PULAU RAMAN, PEMAYUNG, BATANGHARI, JAMBI, 36657, 36657',
            'nama_ayah' => 'AHMADI',
            'nama_ibu' => 'MASITA',
            'nama_wali' => 'AHMADI',
        ]);

        Siswa::create([
            'name' => 'ARDIANSYAH',
            'nisn' => '0061803286',
            'nik' => '1505021124860071',
            'kelas_id' => 2,
            'tempat_lahir' => 'KAMPUNG BARU',
            'tanggal_lahir' => '2006-01-18',
            'jenkel' => 'laki-laki',
            'alamat' => 'rt 08 SENGETI, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'hengky supriadi',
            'nama_ibu' => 'LAMISA',
            'nama_wali' => 'hengky supriadi',
        ]);

        Siswa::create([
            'name' => 'MUHAMMAD EDRIAN',
            'nisn' => '0065643180',
            'nik' => '1509067202060005',
            'kelas_id' => 2,
            'tempat_lahir' => 'LUBUK BASUNG',
            'tanggal_lahir' => '2006-02-12',
            'jenkel' => 'laki-laki',
            'alamat' => 'RT 04 DESA SUAK PUTAT SUAK PUTAT, SEKERNAN, MUARO JAMBI, JAMBI, 36381, 36381',
            'nama_ayah' => 'zalman efendi',
            'nama_ibu' => 'ERNI MARLINA',
            'nama_wali' => 'zalman efendi',
        ]);

    
    }
}
