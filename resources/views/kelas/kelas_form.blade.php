@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Tambah Kelas</h4>
        </div>
        {{-- form --}}
        <div class="card-body">
            <form action="{{ route('admin.kelas.store') }}" method="POST">
                @csrf
                {{-- nama --}}
                <div class="mb-2 mt-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Nama" aria-describedby="defaultFormControlHelp" required autofocus
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}
                
                {{-- tombol simpan --}}
                <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
            </form>
            {{-- form --}}
        </div>
    </div>
@endsection
