@extends('app.main_guru')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Laporan Absensi</h4>
        </div>
     
        <div class="card-body">
         {{--  --}}
         <form action="/guru/laporan/absensi" method="GET" target="_blank">
            @csrf
            <div class="form-row mb-2 mt-2">
                <div class="form-group col-md-6 mb-2 mt-2">
                    <label for="tanggal_awal"  class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                        value="{{ now()->subMonth(3)->format('Y-m-d') }}">
                </div>
                <div class="form-group col-md-6 mb-2 mt-2">
                    <label for="tanggal_akhir"  class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                        value="{{ now()->addWeek(2)->format('Y-m-d') }}">
                </div>

                <div class="mb-2 mt-2">
                    <label for="user_id" class="form-label">Pilih Guru :</label>
                    <select name="user_id" id="user_id" class="select2 form-select @error('user_id') is-invalid @enderror">
                        @foreach ($user as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2 mt-2">
                    <label for="kelas_id" class="form-label">Pilih Kelas :</label>
                    <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--  --}}

                <div class="mb-2 mt-2">
                    <label for="mapel_id" class="form-label">Pilih Pelajaran :</label>
                    <select name="mapel_id" id="mapel_id" class="select2 form-select @error('mapel_id') is-invalid @enderror">
                        @foreach ($mapel as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
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
                </div>

                
            </div>
            <button type="submit" class="btn btn-primary mt-3">Generate Laporan</button>
        </form>
         {{--  --}}
        </div>
    </div>


   
@endsection
