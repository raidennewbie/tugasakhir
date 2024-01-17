@extends('app.main_admin')

@section('container')

    <div class="card">
        <div class="app-brand mb-1 p-2 m-2">
            <h4 class="demo text-body">Edit Pengguna</h4>
        </div>
        {{-- form --}}
        <div class="card-body">
            <form action="{{ route('admin.user.update', $model->id) }}" method="POST">
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

                {{-- email --}}
                <div class="mb-2 mt-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Email" aria-describedby="defaultFormControlHelp" required
                        value="{{ old('email', $model->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- role --}}
                <div class="mb-2 mt-2 @error('gender') text-danger is-invalid @enderror">
                    <fieldset>
                        <label class="form-label">
                            Role
                        </label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="role" id="guru" value="guru"
                                    @if (old('role', $model->role) == 'guru') checked @endif />
                                <label class="form-check-label form-label" for="guru">
                                    Guru
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="role" id="admin" value="admin"
                                    @if (old('role', $model->role) == 'admin') checked @endif />
                                <label class="form-check-label form-label" for="admin">
                                    Admin
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('role')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  --}}

                {{-- password --}}
                <div class="mb-3 mt-2 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{--  --}}

                {{-- tombol simpan --}}
                <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>
            </form>
            {{-- form --}}
        </div>
    </div>

@endsection
