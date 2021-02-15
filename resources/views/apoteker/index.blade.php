@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Apoteker')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Apoteker
            </div>
            <div class="card-body">
                <a href="{{ route('apoteker.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('apoteker/table')
            </div>
        </div>
    </div>
</div>
@include('apoteker/javascript')
@endsection