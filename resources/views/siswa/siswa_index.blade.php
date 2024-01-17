@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Data Siswa</h4>
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

        {{-- tambah --}}
        <div class="card-body">
            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary btn-sm">TAMBAH</a>
        </div>
        {{--  --}}

        {{-- cari --}}
        <div class="col-md-6">
            <form action="/admin/siswa" method="GET">
                <div class="input-group mb-1 p-2 m-10">
                    <input type="text" class="form-control" placeholder="Cari Siswa" name="query"
                        value="{{ request('query') }}">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        {{--  --}}

        {{-- tabel --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>kelas</th>
                        <th>jenis kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($model as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td>{{ $siswa->kelas?->name }}</td>
                            <td>{{ $siswa->jenkel }}</td>
                            
                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                    <a class="dropdown-item" href="{{ route('admin.siswa.show', $siswa->id) }}">
                                        <i class="bx bx-info-circle me-1 btn btn-info btn-sm"></i>Detail</a>

                                    {{-- edit --}}
                                    <a class="dropdown-item" href="{{ route('admin.siswa.edit', $siswa->id) }}">
                                        <i class="bx bx-edit-alt me-1 btn btn-warning btn-sm"></i>Edit</a>
                                    {{--  --}}

                                    {{-- hapus --}}
                                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item"
                                            onclick="return confirm('Anda yakin menghapus {{ $siswa->name }} ?')">
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
        {{-- tabel --}}
        <div class="sm mt-3 mb-3">
         {{-- {{ $model->links() }} --}}
         {{ $model->appends(request()->query())->links() }}
         {{--  --}}
        </div>
    </div>
@endsection
