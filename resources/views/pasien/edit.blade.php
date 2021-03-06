@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Pasien')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_pasien') is-invalid @enderror" name="nama_pasien"
                                    placeholder="Nama Pasien" value="{{ $pasien->nama_pasien }}">
                                @error('nama_pasien')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                                    placeholder="Tanggal Lahir" value="{{ $pasien->tgl_lahir }}">
                                @error('tgl_lahir')
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
                                    class="form-control form-control-sm @error('alamat') is-invalid @enderror">{{ $pasien->alamat }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan </label>
                                <input type="text"
                                    class="form-control form-control-sm @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                                    placeholder="Pekerjaan " value="{{ $pasien->pekerjaan }}">
                                @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('agama') is-invalid @enderror" name="agama"
                                    placeholder="Agama" value="{{ $pasien->agama }}">
                                @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('telepon') is-invalid @enderror" name="telepon"
                                    placeholder="No Telepon" value="{{ $pasien->telepon }}">
                                @error('telepon')
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
                                    value="{{ $pasien->user_pasien->email }}" name="email" placeholder="Masukan Email">
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
                                <label>Alergi obat</label>
                                <textarea name="alergi_obat"
                                    class="form-control form-control-sm @error('alergi_obat') is-invalid @enderror">{{ $pasien->alergi_obat }}</textarea>
                                @error('alergi_obat')
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
                        <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Perbarui</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('textAreaEditor');
</script>
@endsection
