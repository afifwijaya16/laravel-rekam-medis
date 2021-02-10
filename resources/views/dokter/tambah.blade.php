@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Dokter')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dokter.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Dokter</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    value="{{ old('name')}}" name="name" placeholder="Masukan Nama Dokter">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Spesialis</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('spesialis') is-invalid @enderror"
                                    value="{{ old('spesialis')}}" name="spesialis"
                                    placeholder="Masukan Spesialis Dokter">
                                @error('spesialis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir')}}" name="tanggal_lahir"
                                    placeholder="Masukan Tanggal Lahir">
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_telepon') is-invalid @enderror"
                                    value="{{ old('no_telepon')}}" name="no_telepon"
                                    placeholder="Masukan Nomor Telepon Dokter">
                                @error('no_telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    value="{{ old('email')}}" name="email" placeholder="Masukan Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Biaya Tindakan</label>
                                <input type="number"
                                    class="form-control form-control-sm @error('biaya_tindakan') is-invalid @enderror"
                                    value="{{ old('biaya_tindakan')}}" name="biaya_tindakan" placeholder="Masukan Biaya Tindakan">
                                @error('biaya_tindakan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control form-control-sm @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror"
                            name="password" placeholder="Masukan Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="{{ route('dokter.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
