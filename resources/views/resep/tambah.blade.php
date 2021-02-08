@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Resep')
@section('content')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #2980b9;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Resep</label>
                        <input type="text" class="form-control form-control-sm @error('resep') is-invalid @enderror"
                            name="resep" placeholder="Nama Resep" value="{{ old('resep') }}">
                        @error('resep')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Obat</label>
                        <select name="obat[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach ($obat as $result)
                            <option value="{{ $result->id }}"
                                {{in_array($result->id, old("obat") ?: []) ? "selected": ""}}>{{ $result->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            width: '100%'
        });
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
    CKEDITOR.replace('textAreaEditor');
</script>
@endpush
@endsection
