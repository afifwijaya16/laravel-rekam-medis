@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Obat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Obat </label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama"
                                    placeholder="Nama Obat " value="{{ $obat->nama }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar </label>
                                <input type="file"
                                    class="form-control form-control-sm @error('gambar') is-invalid @enderror"
                                    name="gambar" placeholder="Gambar ">
                                @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga Obat</label>
                                <input type="number"
                                    class="form-control form-control-sm @error('harga') is-invalid @enderror"
                                    name="harga" placeholder="Harga Obat" value="{{ $obat->harga }}">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Stock Obat</label>
                                <input type="number"
                                    class="form-control form-control-sm @error('stock') is-invalid @enderror"
                                    name="stock" placeholder="Stock Obat" value="{{ $obat->stock }}">
                                @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dosis</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('dosis') is-invalid @enderror"
                                    name="dosis" placeholder="Dosis" value="{{ $obat->dosis }}">
                                @error('dosis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('satuan') is-invalid @enderror"
                                    name="satuan" placeholder="Satuan" value="{{ $obat->satuan }}">
                                @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kemasan </label>
                                <input type="text"
                                    class="form-control form-control-sm @error('kemasan') is-invalid @enderror"
                                    name="kemasan" placeholder="Kemasan " value="{{ $obat->kemasan }}">
                                @error('kemasan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label>Komposisi</label>
                                <textarea name="komposisi" id="textAreaEditor"
                                    class="form-control form-control-sm @error('komposisi') is-invalid @enderror">{{ $obat->komposisi }}</textarea>
                                @error('komposisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan"
                                    class="form-control form-control-sm @error('keterangan') is-invalid @enderror">{{ $obat->keterangan }}</textarea>
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Perbarui</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('textAreaEditor');
</script>
@endsection
