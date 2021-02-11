@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Detail')
@section('content')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #2980b9;
    }
</style>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Catatan Untuk Apoteker!</h5>
    {{ $rekam_medis->catatan_apoteker }}
</div>
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
    <div class="row mb-2">
        <div class="col-12">
            <button type="button" class="btn btn-sm btn-info float-right" title="Detail"
                data-toggle="modal" data-target="#modal-tambah-obat" data-backdrop="static"
                data-keyboard="false">
                <i class="fa fa-plus"></i> Tambah Obat
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Aksi</th>
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
                        <td>
                            <form action="{{ route('apotik.destroy', $detail_resep->id) }}" id="form-delete-{{ $detail_resep->id}}" role="form"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-xs btn-danger" name="delete" type="submit"
                                    onclick="deleteFunction({{ $detail_resep->id}})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ $detail_resep->obat->nama }}</td>
                        <td>{{ $detail_resep->obat->dosis }}</td>
                        <td>{{ $detail_resep->obat->satuan }}</td>
                        <td>
                            @if($detail_resep->obat->stock == 0)
                            <button class="btn btn-xs btn-danger" title="Stock Habis"><i class="fa fa-times"></i></button>
                            @else
                            <button class="btn btn-xs btn-success" title="Ready Stock"><i class="fa fa-check"></i></button>
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
                <table class="table table-sm">
                    <tr>
                        <th style="width:50%">Tindakan:</th>
                        <td>Rp. {{ number_format(Auth::user()->biaya_tindakan) }}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. {{ number_format($total_harga)}}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Total Biaya:</th>
                        <td>Rp. {{ number_format($total_harga + Auth::user()->biaya_tindakan)}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-12">
            <form action="{{ route('apotik.update', $rekam_medis->id) }}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" class="form-control" name="total_pembayaran" value="{{ $total_harga + Auth::user()->biaya_tindakan }}">
                <button type="submit" value="submit_pembayaran" class="btn btn-success float-right" name="submitbutton"><i class="far fa-credit-card"></i> Check Out
                </button>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-tambah-obat" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('apotik.store') }}" method="POST">
                <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                    @csrf
                    <div class="form-group">
                        <label>Obat</label>
                        <input type="hidden" class="form-control" name="id_resep" value="{{ $rekam_medis->id_resep }}">
                        <select name="id_obat" id="mySelect"
                            class="js-example-basic-single form-control form-control-sm @error('id_obat') is-invalid @enderror">
                            <option value="0" selected disabled>-- Pilih Obat --</option>
                            @foreach ($obat as $result)
                            <option value="{{ $result->id }}"
                                {{ (collect(old('id_obat'))->contains($result->id)) ? 'selected':'' }}>
                                {{ $result->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status') }}',
    })
</script>
@endif
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            width: '100%'
        });
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
    function deleteFunction($id) {
        event.preventDefault();
        const form = 'form-delete-' + $id;
        Swal.fire({
            title: 'Apakah anda yakin menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(form).submit();
            }
        }).catch((error) => {
            console.log(error);
        })
    }
</script>
@endpush
@endsection
