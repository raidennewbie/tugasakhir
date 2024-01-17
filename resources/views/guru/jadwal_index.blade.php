@extends('app.main_guru')

@section('container')
<div class="card">
    <div class="app-brand mb-1 p-2 m-2">
        <h4 class="demo text-body">Jadwal Mengajar</h4>
    </div>
    {{-- tambah berhasil --}}
    @if (session()->has('success'))
        <div class="card alert alert-success col-lg-12 p-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{--  --}}

    {{-- hapus berhasil --}}
    @if (session()->has('delete'))
        <div class="card alert alert-danger col-lg-12 p-2" role="alert">
            {{ session('delete') }}
        </div>
    @endif
    {{--  --}}

    @if (session()->has('update'))
    <div class="card alert alert-warning col-lg-12 p-2" role="alert">
        {{ session('update') }}
    </div>
@endif

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Hari</th>
                    <th>Kelas</th>
                    <th>Pelajaran</th>
                    <th>Jam</th>
                    <th>Semester</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($model as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->user?->name }}</td>
                        <td>{{ $kelas->hari }}</td>
                        <td>{{ $kelas->kelas?->name }}</td>
                        <td>{{ $kelas->mapel?->name }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($kelas->jam_masuk)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($kelas->jam_selesai)->format('H:i') }}
                        </td>
                        <td>{{ $kelas->semester?->name}}</td>
                        <td>{{ $kelas->tahunajar?->tahun_ajaran}}</td>
                            <td>
                                <a href="{{ route('guru.absensi.create', [
                                    'kelas_id' => $kelas->kelas->id,
                                    'jadwal_id' => $kelas->id
                                    ]) }}"
                                 
                                   class="btn btn-sm btn-primary">Mulai Absensi</a>
                            </td>
                </tr>
        </tbody>
        @endforeach
    </table>
    </div>
</div>

@endsection
