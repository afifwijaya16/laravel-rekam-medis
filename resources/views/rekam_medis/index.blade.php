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
                <form action="{{ route('rekam_medis.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-12 bg-primary my-2">
                            <label class="control-label m-0"><strong>Data Pasien</strong></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pilih Pasien</label>
                        <select name="id_pasien" id="mySelect"
                            class="js-example-basic-single form-control form-control-sm @error('id_pasien') is-invalid @enderror">
                            <option value="0" selected disabled>-- Pilih Pasien --</option>
                            @foreach ($pasien as $result)
                            <option value="{{ $result->id }}"
                                {{ (collect(old('id_pasien'))->contains($result->id)) ? 'selected':'' }}>
                                {{ $result->nama_pasien }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_pasien')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Keluhan</label>
                        <textarea name="keluhan"
                            class="form-control form-control-sm @error('keluhan') is-invalid @enderror">{{ old('keluhan') }}</textarea>
                        @error('keluhan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @include('rekam_medis/table')
            </div>
        </div>
    </div>
</div>
@include('rekam_medis/javascript')
@include('rekam_medis/showpasien')
@endsection
