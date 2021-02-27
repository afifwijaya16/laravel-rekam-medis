@extends('template_backend/template')
@section('sub-breadcrumb', 'Data Detail Rekam Medis Pasien')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Detail Rekam Medis
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <td>Nomor Pasien</td>
                        <td>{{ $pasien->nomor_pasien }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>{{ $pasien->nama_pasien }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ $pasien->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $pasien->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $pasien->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Alergi Obat</td>
                        <td>{{ $pasien->alergi_obat }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th>No Registrasi</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Keluhan</th>
                                <th>Diagnosa</th>
                                <th>Tindakan</th>
                                <th>Catatan</th>
                                <th>Dokter</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($hasil->no_rekam, 'QRCODE')}}" alt="barcode" />
                                <br>
                                {{ $hasil->no_rekam }}
                                </td>
                                <td class="text-center">
                                    {{ Carbon\Carbon::parse($hasil->created_at)->translatedFormat('d F Y') }}
                                </td>
                                <td class="text-center">
                                    {{ $hasil->keluhan }}
                                </td>
                                <td class="text-center">
                                    {{ $hasil->diagnosa }}
                                </td>
                                <td class="text-center">
                                    {{ $hasil->tindakan }}
                                </td>
                                <td class="text-center">
                                    {{ $hasil->catatan }}
                                </td>
                                <td class="text-center">
                                    {{ $hasil->user->name }}
                                </td>
                                <td class="text-center">
                                    <a href="#" id="showData" class="btn btn-xs btn-primary" data-id="{{ $hasil->id }}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Pasien</h4>
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
            $('body').on('click', '#showData', function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            $.get('cek_data_rekam_medis/' + id , function (data) {
                $('#modal-detail').modal('show');
                $("#data_modal").html(data); //replace load to html
            })
        });
    });
</script>

@endpush
<script>
    CKEDITOR.replace('textAreaEditor');

</script>
@endsection
