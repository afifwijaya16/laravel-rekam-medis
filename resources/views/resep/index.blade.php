@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Resep')
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
                <button type="button" class="btn btn-xs btn-primary float-right" title="Detail"
                    data-toggle="modal" data-target="#modal-tambah-resep" data-backdrop="static"
                    data-keyboard="false">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
            <div class="card-body">
                @include('resep/table')
            </div>
        </div>
    </div>
</div>
@include('resep/modal_tambah')
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
