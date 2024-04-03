@extends('app.main_guru')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Daftar Absensi</h4>
        </div>
        @if (session()->has('error'))
            <div class="card alert alert-danger col-lg-12 p-2" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('guru.absensi.store') }}">
                @csrf
                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Guru :</span>
                    <p class="card-title" style="display: inline;">{{ $jadwal->user->name }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Kelas :</span>
                    <p class="card-title" style="display: inline;"> {{ $jadwal->kelas->name }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Mata Pelajaran :</span>
                    <p class="card-title" style="display: inline;"> {{ $jadwal->mapel->name }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Hari :</span>
                    <p class="card-title" style="display: inline;"> {{ $jadwal->hari }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Jam :</span>
                    <p class="card-title" style="display: inline;">
                        {{ \Carbon\Carbon::parse($jadwal->jam_masuk)->format('H:i') }} - 
                        {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                    </p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Semester :</span>
                    <p class="card-title" style="display: inline;"> {{ $jadwal->semester->name }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Tahun Ajaran :</span>
                    <p class="card-title" style="display: inline;"> {{ $jadwal->tahunajar->tahun_ajaran }}</p>
                </div>

        {{--  --}}
        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
        {{--  --}}
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td>
                                <div class="mb-2 mt-2 @error('status') text-danger is-invalid @enderror">
                                    <fieldset>
                                        <div class="d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio"
                                                    name="siswa_id[{{ $siswa->id }}]" id="H_{{ $siswa->id }}"
                                                    value="H" @if (old('status.' . $siswa->id) == 'H') checked @endif />
                                                <label class="form-check-label form-label" for="H_{{ $siswa->id }}">
                                                    H
                                                </label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio"
                                                    name="siswa_id[{{ $siswa->id }}]" id="I_{{ $siswa->id }}"
                                                    value="I" @if (old('status.' . $siswa->id) == 'I') checked @endif />
                                                <label class="form-check-label form-label" for="I_{{ $siswa->id }}">
                                                    I
                                                </label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio"
                                                    name="siswa_id[{{ $siswa->id }}]" id="A_{{ $siswa->id }}"
                                                    value="A" @if (old('status.' . $siswa->id) == 'A') checked @endif />
                                                <label class="form-check-label form-label" for="A_{{ $siswa->id }}">
                                                    A
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    @error('status')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
        </form>
    </div>
    </div>
@endsection
