@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Tambah Tahun Ajaran</h4>
        </div>
        {{-- form --}}
        <div class="card-body">
            <form action="{{ route('admin.tahunajar.store') }}" method="POST">
                @csrf
                {{-- nama --}}

                <div class="mb-2 mt-2">
                    <label for="tahun_ajaran" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                        name="tahun_ajaran" placeholder="Nama" aria-describedby="defaultFormControlHelp" required autofocus
                        value="{{ old('tahun_ajaran') }}">
                    @error('tahun_ajaran')
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
