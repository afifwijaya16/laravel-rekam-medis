@extends('template_backend/home')
@section('sub-breadcrumb', 'Dokter')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Dokter
            </div>
            <div class="card-body">
                <a href="{{ route('dokter.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('dokter/table')
            </div>
        </div>
    </div>
</div>
@include('dokter/javascript')
@endsection