@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Password')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Perbarui Password</div>

            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{route('perbaruipassword_new')}}">
                    @csrf
                    <div class="form-group">
                        <label for="new-password" class="col-md-4 control-label">Password Lama</label>
                        <div class="col-md-6">
                            <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" required>
                            @error('current-password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password" class="col-md-4 control-label">Password Baru</label>
                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label">Ulangi Password Baru</label>

                        <div class="col-md-6">
                            <input id="new-password_confirm" type="password" class="form-control @error('new_password_confirm') is-invalid @enderror"
                                name="new_password_confirm" required>
                            @error('new_password_confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Change Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection