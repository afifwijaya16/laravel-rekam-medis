<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">No obat</th>
                <th width="40%">Nama Obat</th>
                <th width="10%">harga</th>
                <th width="5%">Stock</th>
                <th width="5%">Dosis</th>
                <th width="5%">Status</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">    
                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($hasil->nomor_obat, 'QRCODE')}}" alt="barcode" />
                    <br>
                    {{ $hasil->nomor_obat }}
                </td>
                <td class="text-center">{{ $hasil->nama }}</td>
                <td class="text-center">{{ $hasil->harga }}</td>
                <td class="text-center">{{ $hasil->stock }}</td>
                <td class="text-center">{{ $hasil->dosis }}</td>
                <td class="text-center">
                    @if($hasil->stock == 0)
                        <button class="btn btn-xs btn-danger" title="Stock Habis"><i class="fa fa-times"></i></button>
                    @else
                        <button class="btn btn-xs btn-success" title="Ready Stock"><i class="fa fa-check"></i></button>
                    @endif
                </td>
                <td class="text-center">
                    <form action="{{ route('obat.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{ route('obat.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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