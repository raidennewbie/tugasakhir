@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Tambah Jadwal</h4>
        </div>
        {{-- form --}}
        <div class="card-body">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf

              
                <div class="mb-2 mt-2">
                    <label for="user_id" class="form-label">Pilih Guru :</label>
                    <select name="user_id" id="user_id" class="select2 form-select @error('user_id') is-invalid @enderror">
                        @foreach ($user as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- kelas --}}
                <div class="mb-2 mt-2">
                    <label for="kelas_id" class="form-label">Pilih Kelas :</label>
                    <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                <div class="mb-2 mt-2">
                    <label for="mapel_id" class="form-label">Pilih Pelajaran :</label>
                    <select name="mapel_id" id="mapel_id" class="select2 form-select @error('mapel_id') is-invalid @enderror">
                        @foreach ($mapel as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                    @error('mapel_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2 mt-2">
                    <label for="mapel_id" class="form-label">Pilih Semester :</label>
                    <select name="semester_id" id="semester_id" class="form-select @error('semester_id') is-invalid @enderror">
                        @foreach ($semester as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2 mt-2">
                    <label for="mapel_id" class="form-label">Pilih Tahun :</label>
                    <select name="tahunajar_id" id="tahunajar_id" class="form-select @error('tahunajar_id') is-invalid @enderror">
                        @foreach ($tahun as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->tahun_ajaran }}</option>
                        @endforeach
                    </select>
                    {{-- @error('mapel_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror --}}
                </div>

                <div class="mb-2 mt-2">
                    <label for="hari" class="form-label">Hari</label>
                    <select name="hari" id="hari" class="form-select @error('hari') is-invalid @enderror">
                      <option value="senin">Senin</option>
                      <option value="selasa">Selasa</option>
                      <option value="rabu">Rabu</option>
                      <option value="kamis">Kamis</option>
                      <option value="jumat">Jumat</option>
                      <option value="sabtu">Sabtu</option>
                    </select>
                    @error('hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2 mt-2">
                    <label for="jam_masuk">Jam Masuk :</label>
                    <input type="time" id="jam_masuk" name="jam_masuk"
                        class="form-control @error('jam_masuk') is-invalid @enderror" required
                        value="{{ old('jam_masuk') }}">
                    @error('jam_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2 mt-2">
                    <label for="jam_selesai">Jam Selesai :</label>
                    <input type="time" id="jam_selesai" name="jam_selesai"
                        class="form-control @error('jam_selesai') is-invalid @enderror" required
                        value="{{ old('jam_selesai') }}">
                    @error('jam_selesai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- tombol simpan --}}
                <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
            </form>
            {{-- form --}}
        </div>
    </div>

@endsection
