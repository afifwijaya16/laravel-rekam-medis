@extends('template_backend/home')
@section('sub-breadcrumb', 'Halaman Utama')
@section('content')
<div class="row">
    @if (Auth::user()->level == 'admin')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $obat }}</h3>
                <p>Data Obat</p>
            </div>
            <div class="icon">
                <i class="fa fa-medkit"></i>
            </div>
            <a href="{{ route('obat.index') }}" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>{{ $dokter }}</h3>
                <p>Data Dokter</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('dokter.index') }}" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $pasien }}</h3>
                <p>Data Pasien</p>
            </div>
            <div class="icon">
                <i class="fa fa-address-card"></i>
            </div>
            <a href="{{ route('pasien.index') }}" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endif

</div>

@endsection
