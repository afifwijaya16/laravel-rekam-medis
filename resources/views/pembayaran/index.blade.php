@extends('template_backend/home')
@section('sub-breadcrumb', 'Pembayaran')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Belum Melakukan Pembayaran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Telp</th>
                                <th>Keluhan</th>
                                <th>Pemeriksa</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($belum_bayar as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">{{ $hasil->pasien->telepon }}</td>
                                <td class="text-center">{{ $hasil->keluhan }}</td>
                                <td class="text-center">{{ $hasil->user->name }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($hasil->created_at)->translatedFormat('d F Y') }}</td>
                                <td class="text-center">
                                    <a href="#" id="showData" class="btn btn-xs btn-primary" data-id="{{ $hasil->id }}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Data Sudah Melakukan Pembayaran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable-0" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Telp</th>
                                <th>Keluhan</th>
                                <th>Pemeriksa</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sudah_bayar as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">{{ $hasil->pasien->telepon }}</td>
                                <td class="text-center">{{ $hasil->keluhan }}</td>
                                <td class="text-center">{{ $hasil->user->name }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($hasil->created_at)->translatedFormat('d F Y') }}</td>
                                <td class="text-center">
                                    <a href="#" id="showData" class="btn btn-xs btn-primary" data-id="{{ $hasil->id }}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
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
                <h4 class="modal-title">Detail Data Rekam Medis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="data_modal">
            
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
            $.get('pembayaran/cek_data/' + id , function (data) {
                $('#modal-detail').modal('show');
                $("#data_modal").html(data); //replace load to html
            })
        });
    });
</script>
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status') }}',
    })
</script>
@endif
@endpush
@endsection
