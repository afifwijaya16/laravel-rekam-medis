<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">No Resep</th>
                <th width="20%">Resep</th>
                <th width="20%">Detail</th>
                <th width="20%">Pembuat Resep</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resep as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->no_resep }}</td>
                <td class="text-center">{{ $hasil->resep }}</td>
                <td class="text-center">
                    <ul style="list-style-type: none; margin: 0; padding: 0;">
                        @foreach ($hasil->detailreseps as $detail_resep)
                        <li>{{ $detail_resep->obat->nama }} </li>
                        @endforeach
                    </ul>
                </td>
                <td class="text-center">{{ $hasil->user->name}}</td>
                <td class="text-center">
                    <form action="{{ route('resep.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{ route('resep.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" name="delete" type="submit"
                                onclick="deleteFunction({{ $hasil->id}})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </form>

                </td>
            </tr>
            @endforeach
    </table>
</div>
