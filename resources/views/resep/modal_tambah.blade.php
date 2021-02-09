<div class="modal fade" id="modal-tambah-resep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tambah_resep_obat') }}" method="POST">
                <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                    @csrf
                    <div class="form-group">
                        <label>Nama Resep Obat </label>
                        <input type="text" class="form-control form-control-sm @error('resep') is-invalid @enderror"
                            name="resep" placeholder="Nama Resep Obat" value="{{ old('resep') }}">
                        @error('resep')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Obat</label>
                        <select name="obat[]" class="form-control js-example-basic-multiple" required multiple="multiple">
                            @foreach ($obat as $result)
                                <option value="{{ $result->id }}" {{in_array($result->id, old("obat") ?: []) ? "selected": ""}}>{{ $result->nama }}</option> 
                            @endforeach
                        </select>
                        @error('obat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>