@extends('app.main')

@section('container')
    <div class="card ms-auto">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body fw-bolder">Data User</h4>
        </div>
        {{-- tabel --}}
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($model as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->email }}</td>
                        <td>{{ $a->role }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-info-circle me-1"></i>Detail</a>
                                    {{--  --}}
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-edit-alt me-1"></i>Edit</a>
                                    {{--  --}}
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
            </tbody>
            {{-- tabel --}}
    </div>
    @endforeach
@endsection
