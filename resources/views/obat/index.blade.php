@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Obat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Obat
            </div>
            <div class="card-body">
                <a href="{{ route('obat.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('obat/table')
            </div>
        </div>
    </div>
</div>
@include('obat/javascript')
@endsection