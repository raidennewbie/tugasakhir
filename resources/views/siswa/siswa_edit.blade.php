@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Edit Siswa : {{ $model->name }}</h4>
        </div>
        {{-- form --}}
        <div class="card-body">
            <form action="{{ route('admin.siswa.update', $model->id) }}" method="POST">
                @method('put')
                @csrf
                {{-- nama --}}
                <div class="mb-2 mt-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Nama" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('name', $model->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- nisn --}}
                <div class="mb-2 mt-2">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                        name="nisn" placeholder="NISN" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('nisn', $model->nisn) }}">
                    @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- nik --}}
                <div class="mb-2 mt-2">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        name="nik" placeholder="NIK" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('nik', $model->nik) }}">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- kelas --}}
                <div class="mb-2 mt-2">
                    <label for="kelas_id" class="form-label">Pilih Kelas :</label>
                    <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $model->kelas_id ? 'selected' : '' }}>
                                {{ $kelasItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{--  --}}

                {{-- tempat lahir --}}
                <div class="mb-2 mt-2">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        name="tempat_lahir" placeholder="Tempat Lahir" aria-describedby="defaultFormControlHelp" required
                         value="{{ old('tempat_lahir', $model->tempat_lahir) }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- tanggal lahir --}}
                <div class="mb-2 mt-2">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror" required
                        value="{{ old('tanggal_lahir', $model->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- <div class="mb-2 mt-2">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="formFile">
                </div> --}}

                {{-- jenis kelamin --}}
                <div class="mb-2 mt-2 @error('jenkel') text-danger is-invalid @enderror">
                    <fieldset>
                        <label class="form-label">
                            Jenis Kelamin
                        </label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="jenkel" id="laki-laki" value="laki-laki"
                                    @if (old('jenkel', $model->jenkel) == 'laki-laki') checked @endif />
                                <label class="form-check-label form-label" for="laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="jenkel" id="perempuan" value="perempuan"
                                    @if (old('jenkel', $model->jenkel) == 'perempuan') checked @endif />
                                <label class="form-check-label form-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('jenkel')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- alamat --}}
                <div class="mb-2 mt-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" placeholder="Alamat" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('alamat', $model->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- nama ayah --}}
                <div class="mb-2 mt-2">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                        name="nama_ayah" placeholder="Nama Ayah" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('nama_ayah', $model->nama_ayah) }}">
                    @error('nama_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- nama ibu --}}
                <div class="mb-2 mt-2">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                        name="nama_ibu" placeholder="Nama Ibu" aria-describedby="defaultFormControlHelp" required 
                        value="{{ old('nama_ibu', $model->nama_ibu) }}">
                    @error('nama_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- nama wali --}}
                <div class="mb-2 mt-2">
                    <label for="nama_wali" class="form-label">Nama Wali</label>
                    <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                        name="nama_wali" placeholder="Nama Wali" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('nama_wali', $model->nama_wali) }}">
                    @error('nama_wali')
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
