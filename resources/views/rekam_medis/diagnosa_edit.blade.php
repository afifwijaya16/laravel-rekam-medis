@extends('template_backend/home')
@section('sub-breadcrumb', 'Diagnosa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rekam_medis.update', $rekam_medis->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Data Dokter</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <input type="hidden" class="form-control form-control-sm" name="id_dokter"
                                            value="{{ Auth::user()->id }}">
                                        <input type="text" class="form-control form-control-sm" name="nama_dokter"
                                            value="{{ Auth::user()->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Data Pasien</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Registrasi</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('no_rekam') is-invalid @enderror"
                                            name="no_rekam" value="{{ $rekam_medis->no_rekam }}" disabled>
                                        @error('no_rekam')
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
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control form-control-sm" name="nama"
                                            value="{{ $rekam_medis->pasien->nama_pasien }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control form-control-sm" name="nama"
                                            value="{{ $rekam_medis->pasien->tgl_lahir }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control form-control-sm"
                                            disabled>{{ $rekam_medis->pasien->alamat }}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pekerjaan </label>
                                        <input type="text" class="form-control form-control-sm" name="pekerjaan"
                                            placeholder="Pekerjaan" value="{{ $rekam_medis->pasien->pekerjaan }}"
                                            disabled>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alergi obat</label>
                                        <textarea name="alergi_obat" class="form-control form-control-sm"
                                            disabled>{{ $rekam_medis->pasien->alergi_obat }}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary">Selesai</button>
                                <a href="{{ route('diagnosa') }}" class="btn btn-warning btn-sm">Kembali</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Diagnosa</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keluhan</label>
                                        <textarea name="keluhan"
                                            class="form-control form-control-sm" disabled>{{ $rekam_medis->keluhan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Tindakan</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tindakan</label>
                                        <textarea name="tindakan"
                                            class="form-control form-control-sm @error('tindakan') is-invalid @enderror">{{ old('tindakan') }}</textarea>
                                        @error('tindakan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
