@push('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    function deleteFunction($id) {
        event.preventDefault();
        const form = 'form-delete-' + $id;
        Swal.fire({
            title: 'Apakah anda yakin menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(form).submit();
            }
        }).catch((error) => {
            console.log(error);
        })
    }
    $(document).ready(function () {
            $('body').on('click', '#showData', function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.get('cek_pasien/' + id , function (data) {
                $('#modal-detail').modal('show');
                $("#data_modal").html(data); //replace load to html
            })
        });
    });
</script>

@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status') }}',
    })
</script>
@endif

@endpush