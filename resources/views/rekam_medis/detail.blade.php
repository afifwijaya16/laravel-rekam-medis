@extends('template_backend/home')
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
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
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('textAreaEditor');

</script>
@endsection
