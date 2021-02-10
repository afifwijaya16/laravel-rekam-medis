@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Laporan Pengeluaran Obat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Laporan Pengeluaran Obat
            </div>
            <div class="card-body">
                <form action="{{ route('laporan_pengeluaran_obat.filter') }}" class="form-horizontal my-2" method="get">
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
                                <th>No Obat</th>
                                <th>Nama Obat</th>
                                <th>Satuan</th>
                                <th>Qty</th>
                                <th>Tanggal Keluar</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($pengeluaran_obat))
                                @foreach ($pengeluaran_obat as $result => $hasil)
                                <tr class="table-sm">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $hasil->obat->nomor_obat }}</td>
                                    <td class="text-center">{{ $hasil->obat->nama }}</td>
                                    <td class="text-center">{{ $hasil->obat->satuan }}</td>
                                    <td class="text-center">{{ $hasil->qty }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($hasil->updated_at)->translatedFormat('d F Y (H:i)') }}</td>
                                    <td class="text-center">Rp. {{ number_format($hasil->total) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    @if(!empty($pengeluaran_obat_total))
                                    <td class="text-right" colspan="6"><b>Sub Total</b></td>
                                    <td class="text-center">Rp. {{ number_format($pengeluaran_obat_total) }}</td>
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
