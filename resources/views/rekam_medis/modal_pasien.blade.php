@extends('template_backend/home')
@section('modal')
<table class="table table-sm table-bordered table-striped">
    <tr>
        <td><strong>Nama Pasien</strong></td>
        <td>{{ $pasien_cek->nama_pasien }}</td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td>{{ $pasien_cek->alamat }}</td>
    </tr>
    <tr>
        <td><strong>Tanggal Lahir</strong></td>
        <td>{{ $pasien_cek->tgl_lahir }}</td>
    </tr>
    <tr>
        <td><strong>Agama</strong></td>
        <td>{{ $pasien_cek->agama }}</td>
    </tr>
    <tr>
        <td><strong>Pekerjaan</strong></td>
        <td>{{ $pasien_cek->pekerjaan }}</td>
    </tr>
    <tr>
        <td><strong>Nomor Telepon</strong></td>
        <td>{{ $pasien_cek->telepon }}</td>
    </tr>
    <tr>
        <td><strong>Alergi Obat</strong></td>
        <td>{{ $pasien_cek->alergi_obat }}</td>
    </tr>
</table>
@endsection
