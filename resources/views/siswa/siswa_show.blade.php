@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Detail Siswa</h4>
        </div>

        <div class="card-body">
            <p><span class="fw-semibold d-block mb-0">NAMA : {{ $siswa->name }}</span></p>
            <p><span class="fw-semibold d-block mb-0">NISN : {{ $siswa->nisn }}</span></p>
            <p><span class="fw-semibold d-block mb-0">NIK : {{ $siswa->nik }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Kelas : {{ $siswa->kelas?->name }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Tempat Tanggal Lahir : {{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Jenis Kelamin : {{ $siswa->jenkel }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Alamat : {{ $siswa->alamat }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Ayah : {{ $siswa->nama_ayah }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Ibu : {{ $siswa->nama_ibu }}</span></p>
            <p><span class="fw-semibold d-block mb-0">Wali : {{ $siswa->nama_wali }}</span></p>
        </div>

    </div>
@endsection
