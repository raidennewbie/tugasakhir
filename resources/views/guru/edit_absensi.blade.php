@extends('app.main_guru')

@section('container')
    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Edit Status : {{ $model->siswa->name }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.absensi.update', $model->id) }}">
                @csrf
                @method('PUT')

                <fieldset>
                    <label class="form-label">
                        Status
                    </label>
                    <div class="d-flex">

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="hadir" value="hadir"
                                {{ $model->status === 'hadir' ? 'checked' : '' }}>
                            <label class="form-check-label form-label" for="hadir">Hadir</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="izin" value="izin"
                                {{ $model->status === 'izin' ? 'checked' : '' }}>
                            <label class="form-check-label form-label" for="izin">Izin</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="alpa" value="alpa"
                                {{ $model->status === 'alpa' ? 'checked' : '' }}>
                            <label class="form-check-label form-label" for="alpa">Alpa</label>
                        </div>
                        
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
