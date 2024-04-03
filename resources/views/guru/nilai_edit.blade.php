@extends('app.main_guru')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Edit Nilai : {{ $model->siswa->name }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.nilai.update', $model->id) }}">
                @csrf
                @method('PUT')

                <fieldset>
                    <label class="form-label">
                        Nilai
                    </label>
                    <div class="d-flex">

                        <div class="mb-2 mt-2">
                            <input type="number" class="form-control"
                                name="nilai" placeholder="Nilai" aria-describedby="defaultFormControlHelp"
                                value="{{ old('nilai', $model->nilai) }}">
                        </div>
                        
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
