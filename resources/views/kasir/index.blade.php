@extends('template_backend/home')
@section('sub-breadcrumb', 'Data kasir')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data kasir
            </div>
            <div class="card-body">
                <a href="{{ route('kasir.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('kasir/table')
            </div>
        </div>
    </div>
</div>
@include('kasir/javascript')
@endsection