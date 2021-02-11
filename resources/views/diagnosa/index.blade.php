@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Diagnosa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Diagnosa Antri
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">No Registrasi</th>
                                <th width="30%">Nama Pasien</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">
                                    <a href="{{ route('diagnosa.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Cek Pasien</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Data Diagnosa Pemeriksaan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable-0" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>No Registrasi</th>
                                <th>Nama Pasien</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis_pemeriksaan as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->user->name}}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">
                                    @if($hasil->user->id == Auth::user()->id)
                                        <a href="{{ route('diagnosa.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Cek Pasien</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Data Diagnosa Selesai Pemeriksaan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable-1" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">No Registrasi</th>
                                <th width="30%">Nama Pasien</th>
                                <th width="25%">Pemeriksa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis_selesai as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hasil->no_rekam }}</td>
                                <td class="text-center">{{ $hasil->pasien->nama_pasien }}</td>
                                <td class="text-center">
                                    {{ $hasil->user->name }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    @if (session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('status') }}',
        })
    </script>
    @endif
@endpush

@endsection
