@extends('app.main_guru')

@section('container')
<div class="card">
    <div class="app-brand mb-1 p-2 m-2">
        <h4 class="demo text-body">Data Absensi</h4>
    </div>
    @if (session()->has('success'))
    <div class="card alert alert-success col-lg-12 p-2" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('delete'))
<div class="card alert alert-danger col-lg-12 p-2" role="alert">
    {{ session('delete') }}
</div>
@endif
{{--  --}}

{{-- cari --}}
{{-- <div class="col-md-6">
    <form action="/guru/absensi" method="GET">
        <div class="input-group mb-1 p-2 m-10">
            <input type="text" class="form-control" placeholder="Cari Absensi" name="query" value="{{ request('query') }}">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </div>
    </form>
</div> --}}
{{--  --}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Pelajaran</th>
                    <th>Semester</th>
                    <th>Tahun</th>
                    <th>Siswa</th>
                    <th>Status</th>
                    <th>Tanggal</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($model as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->user->name}}</td>
                        <td>{{ $kelas->kelas->name}}</td>
                        <td>{{ $kelas->mapel->name}}</td>
                        <td>{{ $kelas->semester->name}}</td>
                        <td>{{ $kelas->tahunajar->tahun_ajaran}}</td>
                        <td>{{ $kelas->siswa->name}}</td>
                        <td>{{ $kelas->status}}</td>
                        <td>{{ $kelas->created_at->format('Y-m-d') }}</td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                    {{-- <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-info-circle me-1 btn btn-info btn-sm"></i>Detail</a> --}}

                                    {{-- edit --}}
                                    <a class="dropdown-item" href="{{ route('guru.absensi.edit', $kelas->id) }}">
                                        <i class="bx bx-edit-alt me-1 btn btn-warning btn-sm"></i>Edit</a>
                                    {{--  --}}

                                    {{-- hapus --}}
                                    <form action="{{ route('guru.absensi.destroy', $kelas->id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item" onclick="return confirm('Anda yakin menghapus data ini ?')">
                                            <i class="bx bx-trash me-1 btn btn-danger btn-sm"></i>Hapus
                                        </button>
                                    </form>
                                    {{--  --}}

                                </div>
                            </div>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="sm mt-3 mb-3">
        {{-- {{ $model->links() }} --}}
        {{-- {{ $model->appends(request()->query())->links() }} --}}
        {{--  --}}
     </div>

</div>

@endsection
