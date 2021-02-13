@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Laporan Pendapatan')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Laporan Pendapatan
            </div>
            <div class="card-body">
                <form action="{{ route('laporan_pendapatan.filter') }}" class="form-horizontal my-2" method="get">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_sekarang') is-invalid @enderror"
                                    name="tanggal_sekarang" placeholder="Nama Pasien"  required value="{{ request('tanggal_sekarang') }}">
                                @error('tanggal_sekarang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_mendatang') is-invalid @enderror"
                                    name="tanggal_mendatang" placeholder="Tanggal Lahir" required  value="{{ request('tanggal_mendatang') }}">
                                @error('tanggal_mendatang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($pendapatan))
                                @foreach ($pendapatan as $result => $hasil)
                                <tr class="table-sm">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $hasil->no_rekam }}</td>
                                    <td class="text-center">{{ $hasil->pasien->nomor_pasien }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($hasil->created_at)->translatedFormat('d F Y') }}</td>
                                    <td class="text-center">Rp. {{ number_format($hasil->total_pembayaran) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    @if(!empty($pendapatan_total))
                                    <td class="text-right" colspan="4"><b>Sub Total</b></td>
                                    <td class="text-center">Rp. {{ number_format($pendapatan_total) }}</td>
                                    @endif
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
