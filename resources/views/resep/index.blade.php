@extends('template_backend/home')
@section('sub-breadcrumb', 'Resep')
@section('content')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #2980b9;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Resep
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-xs btn-info float-right" title="Detail"
                    data-toggle="modal" data-target="#modal-tambah-resep" data-backdrop="static"
                    data-keyboard="false">
                    <i class="fa fa-plus"> Tambah </i>
                </button>
            </div>
            <div class="card-body">
                @include('resep/table')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah-resep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tambah_resep_obat') }}" method="POST">
                <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                    @csrf
                    <div class="form-group">
                        <label>Nama Resep Obat </label>
                        <input type="text" class="form-control form-control-sm @error('resep') is-invalid @enderror"
                            name="resep" placeholder="Nama Resep Obat" value="{{ old('resep') }}">
                        @error('resep')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Obat</label>
                        <select name="obat[]" class="form-control js-example-basic-multiple" required multiple="multiple">
                            @foreach ($obat as $result)
                                <option value="{{ $result->id }}" {{in_array($result->id, old("obat") ?: []) ? "selected": ""}}>{{ $result->nama }}</option> 
                            @endforeach
                        </select>
                        @error('obat')
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
@include('resep/javascript')
@push('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            width: '100%'
        });
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>
@endpush
@endsection
