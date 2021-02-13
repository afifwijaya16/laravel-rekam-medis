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

                            <table class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td>Nama Dokter</td>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td>Spesialis</td>
                                    <td>{{ Auth::user()->spesialis }}</td>
                                </tr>
                            </table>

                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Data Pasien</strong></label>
                                </div>
                            </div>

                            <table class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td>Nomor Registrasi</td>
                                    <td>{{ $rekam_medis->no_rekam }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>{{ $rekam_medis->pasien->nama_pasien }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>{{ $rekam_medis->pasien->tgl_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $rekam_medis->pasien->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>{{ $rekam_medis->pasien->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td>Alergi Obat</td>
                                    <td>{{ $rekam_medis->pasien->alergi_obat }}</td>
                                </tr>
                            </table>
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
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="col-sm-12 bg-primary my-2">
                                    <label class="control-label m-0"><strong>Tindakan</strong></label>
                                </div>
                            </div>
                            <!-- id dokter -->
                            <input type="hidden" class="form-control form-control-sm" name="id_dokter"
                                value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label>Pilih Resep</label>
                                        <select name="id_resep" id="mySelect"
                                            class="js-example-basic-single form-control form-control-sm @error('id_resep') is-invalid @enderror"
                                            onchange="getval(this);">
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
                                <!-- <div class="col-md-12">
                                    <a href="#" class="btn btn-xs btn-info d-none" id="showData" data-id=""><i class="fa fa-eye"></i> Cek Obat</a>
                                </div> -->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Diagnosa</label>
                                        <textarea name="diagnosa"
                                            class="form-control form-control-sm @error('diagnosa') is-invalid @enderror">{{ old('diagnosa') }}</textarea>
                                        @error('diagnosa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Catatan Untuk Apoteker</label>
                                    <textarea name="catatan_apoteker"
                                        class="form-control form-control-sm @error('catatan_apoteker') is-invalid @enderror">{{ old('catatan_apoteker') }}</textarea>
                                    @error('catatan_apoteker')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Selesai</button>
                                <!-- <a href="" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i>Kembali</a> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detail-obat" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">


            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
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

<div class="modal fade show" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                <div class="row">
                    <div class="card-body">
                        <div id="data_modal">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
            </div>
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
    function getval(selection) {
        a = selection.value;
        // console.log(a);
        // document.getElementById('showData').classList.remove("d-none");
        var url = "{{ route('diagnosa.show', ':id_data') }}";
        url = url.replace(":id_data", a);
        // document.getElementById("showData").href = url;
        $('#modal-detail').modal('show');
        $.get(url, function (data) {
            $('#modal-detail').modal('show');
            $("#data_modal").html(data); //replace load to html
        })
    }
    
</script>
@endpush
@endsection
