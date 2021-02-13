@extends('template_backend/home')
@section('modal')

<div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
    <div class="row">
        <div class="card-body">

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
                    <div class="col-sm-12 invoice-col">
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
                                <td><b>Diagnosa</b></td>
                                <td><b>{{ $rekam_medis->diagnosa}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Tindakan</b></td>
                                <td><b>{{ $rekam_medis->tindakan}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Catatan</b></td>
                                <td><b>{{ $rekam_medis->catatan }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Dokter</b></td>
                                <td><b>{{ $rekam_medis->user->name }}</b></td>
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
                </div>

                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tr>
                                    <th style="width:50%">Tindakan:</th>
                                    <td>Rp. {{ number_format($rekam_medis->user->biaya_tindakan) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>Rp. {{ number_format($total_harga)}}</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Total Biaya:</th>
                                    <td>Rp. {{ number_format($total_harga + $rekam_medis->user->biaya_tindakan)}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer justify-content-between">
    @if($rekam_medis->status_pembayaran == "0")
    <form action="{{ route('pembayaran.update', $rekam_medis->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="input-group-prepend">
            <button type="submit" value="tambah" class="btn btn-primary"
                name="submitbutton"><i class="fa fa-save"></i> Telah Bayar</button>
        </div>
    </form>
    @endif
     <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
        Tutup</button>
</div>
@endsection
