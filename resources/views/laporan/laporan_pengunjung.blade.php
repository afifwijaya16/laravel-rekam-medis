@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Laporan Pengunjung')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Laporan Pengunjung
            </div>
            <div class="card-body">
                <form action="{{ route('laporan_pengunjung.filter') }}" class="form-horizontal my-2" method="get">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_sekarang') is-invalid @enderror"
                                    name="tanggal_sekarang" placeholder="Nama Pasien"  required value="{{ request('tanggal_sekarang') }}">
                                @error('tanggal_sekarang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_mendatang') is-invalid @enderror"
                                    name="tanggal_mendatang" placeholder="Tanggal Lahir" required  value="{{ request('tanggal_mendatang') }}">
                                @error('tanggal_mendatang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <dv class="row">
                    <div class="col-sm-12">
                        <h5>Jumlah Pengunjung : @if(!empty($rekam_medis)) {{ $rekam_medis_count }} @endif</h5>
                    </div>
                </dv>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($rekam_medis))
                                @foreach ($rekam_medis as $result => $hasil)
                                <tr class="table-sm">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $hasil->no_rekam }}</td>
                                    <td class="text-center">{{ $hasil->pasien->nomor_pasien }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($hasil->created_at)->translatedFormat('d F Y') }}</td>
                                    <td class="text-center">
                                        <a href="#" id="showData" class="btn btn-xs btn-primary" data-id="{{ $hasil->id }}"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
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
                <h4 class="modal-title">Detail Data Pengunjung</h4>
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
            $.get('cek_data/' + id , function (data) {
                $('#modal-detail').modal('show');
                $("#data_modal").html(data); //replace load to html
            })
        });
    });
</script>
@endpush
@endsection
