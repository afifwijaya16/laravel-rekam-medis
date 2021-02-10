@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Antri Obat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Antri Obat
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">No Registrasi</th>
                                <th width="30%">Nama Pasien</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">
                                    <a href="{{ route('apotik.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Cek Obat</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Data Telah Membayar Obat
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">No Registrasi</th>
                                <th width="30%">Nama Pasien</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis_telah_bayar as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">
                                    <a href="#" id="showData" class="btn btn-xs btn-primary" data-id="{{ $hasil->id }}"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('apotik.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
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
            $.get('apotik/cek_data/' + id , function (data) {
                $('#modal-detail').modal('show');
                $("#data_modal").html(data); //replace load to html
            })
        });
    });
</script>
@endpush
@endsection
