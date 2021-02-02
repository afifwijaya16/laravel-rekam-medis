@extends('template_backend/home')
@section('sub-breadcrumb', 'Pasien')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Pasien
            </div>
            <div class="card-body">
                <a href="{{ route('pasien.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('pasien/table')
            </div>
        </div>
    </div>
</div>
@include('pasien/javascript')
@endsection