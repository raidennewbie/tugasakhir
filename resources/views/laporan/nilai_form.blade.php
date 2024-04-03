@extends('app.main_admin')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Laporan Nilai Siswa</h4>
        </div>
     
        <div class="card-body">
         {{--  --}}
         <form action="/admin/laporan/nilai" method="GET" target="_blank">
            @csrf
            <div class="form-row mb-2 mt-2">
                

                <div class="mb-2 mt-2">
                    <label for="user_id" class="form-label">Pilih Siswa :</label>
                    <select name="siswa_id" id="siswa_id" class="select2 form-select @error('siswa_id') is-invalid @enderror">
                        @foreach ($siswa as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                        @endforeach
                    </select>
                </div>

               

                
            </div>
            <button type="submit" class="btn btn-primary mt-3">Generate Laporan</button>
        </form>-
         {{--  --}}
        </div>
    </div>


   
@endsection
