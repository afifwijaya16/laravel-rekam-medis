<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Nomor Pasien</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('data_pasien', $hasil->nomor_pasien), 'QRCODE')}}" alt="barcode" />
                    <br>
                    {{ $hasil->nomor_pasien }}
                </td>
                <td class="text-center">{{ $hasil->nama_pasien }}</td>
                <td class="text-center">{{ $hasil->alamat }}</td>
                <td class="text-center">{{ $hasil->telepon }}</td>
                <td class="text-center">
                    <form action="{{ route('pasien.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{ route('pasien.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" name="delete" type="submit"
                                onclick="deleteFunction({{ $hasil->id}})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>