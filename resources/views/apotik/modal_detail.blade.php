@extends('template_backend/home')
@section('modal')
<div class="invoice p-3 mb-3">
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Layanan Klinik
                <small class="float-right">Tanggal :
                    {{ Carbon\Carbon::parse($rekam_medis->created_at)->translatedFormat('d F Y') }}</small>
            </h4>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
            <table class="table table-sm">
                <tr>
                    <td><b>Invoice</b></td>
                    <td><b>#{{ $rekam_medis->no_rekam }}</b></td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td><b>{{ $rekam_medis->pasien->nama_pasien}}</b></td>
                </tr>
                <tr>
                    <td><b>Keluhan</b></td>
                    <td><b>{{ $rekam_medis->keluhan}}</b></td>
                </tr>
                <tr>
                    <td><b>Tindakan</b></td>
                    <td><b>{{ $rekam_medis->tindakan}}</b></td>
                </tr>
                <tr>
                    <td><b>Catatan</b></td>
                    <td><b>{{ $rekam_medis->catatan }}</b></td>
                </tr>
            </table>
           
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Dosis</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekam_medis->resep->detailpengeluaran as $detail_resep)
                    <tr>
                        <td>{{ $detail_resep->obat->nama }}</td>
                        <td>{{ $detail_resep->obat->dosis }}</td>
                        <td>{{ $detail_resep->obat->satuan }}</td>
                        <td>{{ $detail_resep->qty }}</td>
                        <td>{{ $detail_resep->obat->harga }}</td>
                        <td>Rp. {{ number_format($detail_resep->total) }}</td>
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
            <div class="table-responsive">
                <table class="table table-sm">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. {{ number_format($total_harga)}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
