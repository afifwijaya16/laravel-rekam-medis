@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Detail')
@section('content')
<div class="invoice p-3 mb-3">
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Layanan Klinik
                <small class="float-right">Date: {{ Carbon\Carbon::parse($rekam_medis->created_at)->translatedFormat('d F Y') }}</small>
            </h4>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            
        </div>
        <div class="col-sm-4 invoice-col">
            
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Invoice #{{ $rekam_medis->no_rekam }}</b><br>
            <br>
            <b>Nama :</b> {{ $rekam_medis->pasien->nama_pasien }}<br>
        </div>
    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Dosis</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekam_medis->resep->detailreseps as $detail_resep)
                    <tr>
                        <td>{{ $detail_resep->obat->nama }}</td>
                        <td>{{ $detail_resep->obat->dosis }}</td>
                        <td>
                            <input type="text" class="form-control form-control-sm">
                        </td>
                        <td>{{ $detail_resep->obat->harga }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-6">
            
        </div>
        <div class="col-6">
            <p class="lead">Amount Due 2/22/2014</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-12">
            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Check Out
            </button>
        </div>
    </div>
</div>
@endsection
