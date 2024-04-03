@extends('app.main_guru')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Daftar Nilai</h4>
        </div>
        
       
        @if (session()->has('error'))
            <div class="card alert alert-danger col-lg-12 p-2" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('guru.nilai.store') }}">
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
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $dataSiswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dataSiswa->nisn }}</td>
                                    <td>{{ $dataSiswa->name }}</td>
                                    <td>
                                        <div class="mb-2 mt-2">
                                            {{-- <input type="number" class="form-control"
                                                name="siswa_id[{{ $dataSiswa->id }}]" id="nilai_{{ $dataSiswa->id }}"
                                                placeholder="Nilai" aria-describedby="defaultFormControlHelp"
                                                value="{{ old('nilai.' . $dataSiswa->id) }}>
                            <label for="nilai_{{ $dataSiswa->id }}"></label> --}}

                                            <input type="number" class="form-control"
                                                name="siswa_id[{{ $dataSiswa->id }}]" id="nilai_{{ $dataSiswa->id }}"
                                                placeholder="Nilai" aria-describedby="defaultFormControlHelp"
                                                value="{{ old('siswa_id.' . $dataSiswa->id, $dataSiswa->nilai) }}">
                                            <label for="nilai_{{ $dataSiswa->id }}"></label>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="app-brand p-2 m-2">
                    <p class="demo text-body"><i>*harap isi semua nilai</i></p>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
