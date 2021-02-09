@extends('template_backend/home')
@section('sub-breadcrumb', 'Diagnosa')
@section('content')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #2980b9;
    }

</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('diagnosa.update', $rekam_medis->id) }}" method="POST"
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
                                        <textarea name="keluhan" class="form-control form-control-sm"
                                            disabled>{{ $rekam_medis->keluhan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Tindakan</strong></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label>Pilih Resep</label>
                                        <select name="id_resep" id="mySelect"
                                            class="js-example-basic-single form-control form-control-sm @error('id_resep') is-invalid @enderror">
                                            <option value="0" selected disabled>-- Pilih Resep --</option>
                                            @foreach ($resep as $result)
                                            <option value="{{ $result->id }}"
                                                {{ (collect(old('id_resep'))->contains($result->id)) ? 'selected':'' }}>
                                                {{ $result->resep }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_resep')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-2">
                                    <div class="form-group">
                                        <label> &nbsp;</label>
                                        <br>
                                        <button type="button" class="btn btn-sm btn-info" title="Detail"
                                            data-toggle="modal" data-target="#modal-tambah-resep" data-backdrop="static"
                                            data-keyboard="false">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea name="catatan"
                                            class="form-control form-control-sm @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                                        @error('catatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary">Selesai</button>
                                    <a href="" class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-tambah-resep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tambah_resep_obat') }}" method="POST">
                <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                    @csrf

                    <div class="form-group">
                        <label>Nama Resep Obat </label>
                        <input type="text" class="form-control form-control-sm @error('resep') is-invalid @enderror"
                            name="resep" placeholder="Nama Resep Obat" value="{{ old('resep') }}">
                        @error('resep')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Obat</label>
                        <select name="obat[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach ($obat as $result)
                            <option value="{{ $result->id }}"
                                {{in_array($result->id, old("obat") ?: []) ? "selected": ""}}>{{ $result->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            width: '100%'
        });
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });

</script>
@endpush
@endsection
