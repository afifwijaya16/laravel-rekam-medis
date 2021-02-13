@extends('template_backend/home')
@section('modal')
<table class="table table-sm table-bordered table-striped">
    <tr>
        <td>Nama Resep</td>
        <td>{{ $resep->resep }}</td>
    </tr>
    <tr>
        <td>Pembuat Resep</td>
        <td>{{ $resep->user->name }}</td>
    </tr>
    <tr>
        <td>Tanggal Pembuatan Resep</td>
        <td>{{ Carbon\Carbon::parse($resep->created_at)->translatedFormat('d F Y') }}</td>
    </tr>
</table>
<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Dosis</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resep->detailreseps as $result => $hasil)
            <tr>
                <td>{{ $hasil->obat->nama }}</td>
                <td>{{ $hasil->obat->dosis }}</td>
                <td>{{ $hasil->obat->satuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
