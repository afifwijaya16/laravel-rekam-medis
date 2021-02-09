@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Dokter')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @csrf
                    @method('patch')
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Dokter</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    value="{{ $dokter->name }}" name="name" placeholder="Masukan Nama Dokter">
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
                                    value="{{ $dokter->spesialis }}" name="spesialis"
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
                                    value="{{ $dokter->tanggal_lahir }}" name="tanggal_lahir"
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
                                    value="{{ $dokter->no_telepon }}" name="no_telepon"
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
                                    value="{{ $dokter->email }}" name="email" placeholder="Masukan Email">
                                @error('email')
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
                                    class="form-control form-control-sm @error('alamat') is-invalid @enderror">{{ $dokter->alamat }}</textarea>
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
                        <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Perbarui</button>
                        <a href="{{ route('dokter.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
