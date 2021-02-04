<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">No Registrasi</th>
                <th width="30%">Nama Pasien</th>
                <th width="20%">Status</th>
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
                    @if($hasil->status_rekam_medis == 'Antri')
                    <span class="btn btn-xs btn-danger">{{ $hasil->status_rekam_medis }}</span>
                    @endif
                </td>
                <td class="text-center">
                    <form action="{{ route('rekam_medis.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}"
                        role="form" method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="#" id="showData" class="btn btn-sm btn-primary" data-id="{{ $hasil->pasien->id }}"><i class="fa fa-eye"></i></a>
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
