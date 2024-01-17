@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Edit Jadwal</h4>
        </div>
        {{-- form --}}
        <div class="card-body">
            <form action="{{ route('admin.jadwal.update', $model->id) }}" method="POST">
                @method('put')
                @csrf
         
                <div class="mb-2 mt-2">
                    <label for="user_id" class="form-label">Pilih Guru :</label>
                    <select name="user_id" id="user_id" class="select2 form-select @error('user_id') is-invalid @enderror">
                        @foreach ($user as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $model->user_id ? 'selected' : '' }}>
                                {{ $kelasItem->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
                            <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $model->mapel_id ? 'selected' : '' }}>
                                {{ $kelasItem->name }}
                            </option>
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
                            <option value="{{ $kelasItem->id }}"  {{ $kelasItem->id == $model->semester_id ? 'selected' : '' }}>
                                {{ $kelasItem->name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- @error('mapel_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror --}}
                </div>

                <div class="mb-2 mt-2">
                    <label for="mapel_id" class="form-label">Pilih Tahun :</label>
                    <select name="tahunajar_id" id="tahunajar_id" class="form-select @error('tahunajar_id') is-invalid @enderror">
                        @foreach ($tahun as $kelasItem)
                            <option value="{{ $kelasItem->id }}"  {{ $kelasItem->id == $model->tahunajar_id ? 'selected' : '' }}>
                                {{ $kelasItem->tahun_ajaran }}</option>
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
                      <option value="senin"  {{ $model->hari === 'senin' ? 'selected' : '' }}>Senin</option>
                      <option value="selasa" {{ $model->hari === 'selasa' ? 'selected' : '' }}>Selasa</option>
                      <option value="rabu" {{ $model->hari === 'rabu' ? 'selected' : '' }}>Rabu</option>
                      <option value="kamis" {{ $model->hari === 'kamis' ? 'selected' : '' }}>Kamis</option>
                      <option value="jumat" {{ $model->hari === 'jumat' ? 'selected' : '' }}>Jumat</option>
                      <option value="sabtu" {{ $model->hari === 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                    </select>
                </div>

                {{-- <div class="mb-2 mt-2">
                    <label for="hari" class="form-label">Hari</label>
                    <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari"
                        name="hari" placeholder="Nama Hari" aria-describedby="defaultFormControlHelp" required autofocus
                        value="{{ old('hari', $model->hari) }}">
                    @error('hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

                <div class="mb-2 mt-2">
                    <label for="jam_masuk">Jam Masuk :</label>
                    <input type="time" id="jam_masuk" name="jam_masuk"
                        class="form-control @error('jam_masuk') is-invalid @enderror" required
                        value="{{ old('jam_masuk', $model->jam_masuk) }}">
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
                        value="{{ old('jam_selesai', $model->jam_selesai) }}">
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
