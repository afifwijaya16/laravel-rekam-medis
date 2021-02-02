@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Dokter')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Dokter </label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_dokter') is-invalid @enderror" name="nama_dokter"
                                    placeholder="Nama Dokter " value="{{ old('nama_dokter') }}">
                                @error('nama_dokter')
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
                                <label>Alamat Dokter</label>
                                <textarea name="alamat_dokter"
                                    class="form-control form-control-sm @error('alamat_dokter') is-invalid @enderror">{{ old('alamat_dokter') }}</textarea>
                                @error('alamat_dokter')
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
                                <label>Tanggal Lahir</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tgl_lahir_dokter') is-invalid @enderror" name="tgl_lahir_dokter"
                                    placeholder="Tanggal Lahir" value="{{ old('tgl_lahir_dokter') }}">
                                @error('tgl_lahir_dokter')
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
                                    class="form-control form-control-sm @error('agama_dokter') is-invalid @enderror" name="agama_dokter"
                                    placeholder="Agama" value="{{ old('agama_dokter') }}">
                                @error('agama_dokter')
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
                                    class="form-control form-control-sm @error('telp_dokter') is-invalid @enderror" name="telp_dokter"
                                    placeholder="No Telepon" value="{{ old('telp_dokter') }}">
                                @error('telp_dokter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-warning btn-sm">Kembali</a>
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
