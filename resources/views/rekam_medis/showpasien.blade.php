@foreach ($rekam_medis as $result => $hasil)
<div class="modal fade" id="modal-detail-{{ $hasil->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                <div class="row">
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td><strong>Nama Pasien</strong></td>
                                <td>{{ $hasil->pasien->nama_pasien }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>{{ $hasil->pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Lahir</strong></td>
                                <td>{{ $hasil->pasien->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <td><strong>Agama</strong></td>
                                <td>{{ $hasil->pasien->agama }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pekerjaan</strong></td>
                                <td>{{ $hasil->pasien->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nomor Telepon</strong></td>
                                <td>{{ $hasil->pasien->telepon }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alergi Obat</strong></td>
                                <td>{{ $hasil->pasien->alergi_obat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
