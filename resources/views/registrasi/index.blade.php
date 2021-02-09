@extends('template_backend/home')
@section('sub-breadcrumb', 'Registrasi')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Registrasi
            </div>
            <div class="card-body">
                 @include('registrasi/form_registrasi')
            </div>
            <div class="card-body">
                @include('registrasi/table')
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                <div class="row">
                    <div class="card-body">
                        <div id="data_modal">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
            </div>
        </div>
    </div>
</div>
@include('registrasi/javascript')
@endsection
