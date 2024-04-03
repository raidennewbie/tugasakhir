@extends('app.main_guru')

@section('container')
<div class="card">
    <div class="app-brand mb-1 p-2 m-2">
        <h4 class="demo text-body">Nilai</h4>
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
                    {{-- <th>Nama</th> --}}
                    {{-- <th>Hari</th> --}}
                    <th>Kelas</th>
                    <th>Pelajaran</th>
                    {{-- <th>Jam</th> --}}
                    <th>Semester</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($model as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                      
                        <td><a class="link-tidak-berwarna" href="{{ route('guru.nilai.index', [
                            'kelas_id' => $kelas->kelas->id,
                            'jadwal_id' => $kelas->id
                            ]) }} ">
                             {{ $kelas->kelas?->name }} </a></td>
<td>{{ $kelas->mapel?->name }}</td>

<style>
    .link-tidak-berwarna {
    color: inherit; /* Menetapkan warna teks link sama dengan warna teks induknya */
    text-decoration: none; /* Menghapus garis bawah pada link */
}

</style>
                        {{-- <td>
                            {{ \Carbon\Carbon::parse($kelas->jam_masuk)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($kelas->jam_selesai)->format('H:i') }}
                        </td> --}}
                        <td>{{ $kelas->semester?->name}}</td>
                        <td>{{ $kelas->tahunajar?->tahun_ajaran}}</td>
                            <td>
                                <a href="{{ route('guru.nilai.create', [
                                    'kelas_id' => $kelas->kelas->id,
                                    'jadwal_id' => $kelas->id
                                    ]) }}"
                                 
                                   class="btn btn-sm btn-primary">Beri Nilai</a>
                            </td>
                </tr>
        </tbody>
        @endforeach
    </table>
    </div>
</div>

@endsection
