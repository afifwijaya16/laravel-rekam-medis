@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Diagnosa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Diagnosa
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
                                    <a href="{{ route('rekam_medis.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Cek Pasien</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection