@extends('template_backend/home')
@section('sub-breadcrumb', 'Rekam Medis')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Rekam Medis
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">No Pasien</th>
                                <th width="30%">Nama Pasien</th>
                                <th width="20%">Alamat</th>
                                <th width="20%">Telp</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($hasil->nomor_pasien, 'QRCODE')}}" alt="barcode" />
                                <br>
                                {{ $hasil->nomor_pasien }}
                                </td>
                                <td class="text-center">{{ $hasil->nama_pasien }}</td>
                                <td class="text-center">{{ $hasil->alamat }}</td>
                                <td class="text-center">{{ $hasil->telepon }}</td>
                                <td class="text-center">
                                    <a href="{{ route('rekam_medis.show', $hasil-> id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
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
@include('rekam_medis/javascript')
@endsection
