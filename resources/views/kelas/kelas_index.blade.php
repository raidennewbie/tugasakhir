@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Data Kelas</h4>
        </div>
        {{-- tambah berhasil --}}
        @if (session()->has('success'))
            <div id="errorMessage" class="card alert alert-success col-lg-12 p-2" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{--  --}}

        {{-- hapus berhasil --}}
        {{-- @if (session()->has('delete'))
            <div id="errorMessage" class="card alert alert-danger col-lg-12 p-2" role="alert">
                {{ session('delete') }}
            </div>
        @endif --}}
        {{--  --}}

        @if (session()->has('update'))
            <div id="errorMessage" class="card alert alert-warning col-lg-12 p-2" role="alert">
                {{ session('update') }}
            </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sembunyikan pesan setelah 5 detik (5000 milidetik)
                setTimeout(function() {
                    var errorMessage = document.getElementById('errorMessage');
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                }, 2000); // 5000 milidetik = 5 detik
            });
        </script>

        {{-- tambah --}}
        <div class="card-body">
            <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm">TAMBAH</a>
        </div>
        {{--  --}}

        {{-- cari --}}
        <div class="col-md-6">
            <form action="/admin/kelas" method="GET">
                <div class="input-group mb-1 p-2 m-10">
                    <input type="text" class="form-control" placeholder="Cari Kelas" name="query"
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
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($model as $kelas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kelas->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">

                                        {{-- <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-info-circle me-1 btn btn-info btn-sm"></i>Detail</a> --}}

                                        {{-- edit --}}
                                        <a class="dropdown-item" href="{{ route('admin.kelas.edit', $kelas->id) }}">
                                            <i class="bx bx-edit-alt me-1 btn btn-warning btn-sm"></i>Edit</a>
                                        {{--  --}}

                                        {{-- hapus --}}
                                        <form id="deleteForm" action="{{ route('admin.kelas.destroy', $kelas->id) }}"
                                            method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="button" class="dropdown-item" onclick="confirmDelete()">
                                                <i class="bx bx-trash me-1 btn btn-danger btn-sm"></i>Hapus
                                            </button>
                                        </form>

                                        <script>
                                            function confirmDelete() {
                                                Swal.fire({
                                                    title: 'Anda yakin menghapus data ini?',
                                                    text: "Anda tidak dapat mengembalikan data yang dihapus!",
                                                    icon: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Yes, hapus!',
                                                    cancelButtonText: 'No, batalkan!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Submit form jika konfirmasi "Yes"
                                                        document.getElementById('deleteForm').submit();
                                                        Swal.fire(
                                                            'Terhapus!',
                                                            'Data telah dihapus.',
                                                            'success'
                                                        );
                                                    } else {
                                                        Swal.fire({
                                                            title: 'Dibatalkan',
                                                            text: 'Penghapusan data dibatalkan.',
                                                            icon: 'info',
                                                            timer: 2000, // Menutup SweetAlert setelah satu detik
                                                            showConfirmButton: false
                                                        });
                                                    }
                                                });
                                            }
                                        </script>


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

        </div>
    </div>
@endsection
