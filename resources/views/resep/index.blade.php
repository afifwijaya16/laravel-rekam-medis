@extends('template_backend/home')
@section('sub-breadcrumb', 'Resep')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Resep
            </div>
            <div class="card-body">
                <a href="{{ route('resep.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('resep/table')
            </div>
        </div>
    </div>
</div>
@include('resep/javascript')
@endsection
