@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Detail')
@section('content')
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
                        <th>Satuan</th>
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekam_medis->resep->detailpengeluaran as $detail_resep)
                    <tr>
                        <td>{{ $detail_resep->obat->nama }}</td>
                        <td>{{ $detail_resep->obat->dosis }}</td>
                        <td>{{ $detail_resep->obat->satuan }}</td>
                        <td>
                            @if($detail_resep->obat->stock == 0)
                            <button class="btn btn-xs btn-danger">Stock Habis</button>
                            @else
                            <button class="btn btn-xs btn-success">Ready Stock</button>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <form action="{{ route('apotik.update', $detail_resep->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="input-group-prepend">
                                            <input type="hidden" class="form-control" name="id_obat"
                                                value="{{ $detail_resep->obat->id }}">
                                            <button type="submit" value="kurang" class="btn btn-danger"
                                                name="submitbutton"><i class="fa fa-minus"></i></button>
                                            <input type="text" class="form-control" value="{{ $detail_resep->qty }}">
                                            <button type="submit" value="tambah" class="btn btn-primary"
                                                name="submitbutton"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $detail_resep->obat->harga }}</td>
                        <td>Rp. {{ number_format($detail_resep->total) }}</td>
                        <td>
                            <form action="{{ route('apotik.update', $detail_resep->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" name="keterangan"
                                        value="{{ $detail_resep->keterangan }}">
                                    <button type="submit" value="keterangan" class="btn btn-primary"
                                        name="submitbutton"><i class="fa fa-plus"></i></button>
                                </div>
                            </form>
                        </td>
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
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. {{ number_format($total_harga)}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-12">
            <form action="{{ route('apotik.update', $detail_resep->id) }}" method="POST">
                @csrf
                @method('put')
                <button type="submit" value="submit_pembayaran" class="btn btn-success float-right" name="submitbutton"><i class="far fa-credit-card"></i> Check Out
                </button>
            </form>
        </div>
    </div>
</div>
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('
        status ') }}',
    })

</script>
@endif
@endsection
