@extends('backend.layout')
@section('content')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between mb-3">
                    <h4 class="header-title">Data Galeri</h4>
                    <a class="btn btn-primary text-white" href="{{ route('gallery.create') }}"><i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <table id="gallery" data-tables="true" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Keterangan</th>
                            <th>Tgl. Upload</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection

@push('custom-scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
<script>
$(function () {
    $('[data-tables=true]').on('click', '[data-button=delete-button]', function (e) {
        //alert($(this).attr('data-id'))
        Swal.fire({
            title: 'Apakah anda yakin untuk menghapus data?',
            showDenyButton: true,
            icon: 'warning',
            confirmButtonText: 'Hapus',
            denyButtonText: `Batal`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/gallery/delete')  }}" + '/' + $(this).attr('data-id'),
                    type: "POST",
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if(data.code == 200){
                            loadingDone()
                            msg_success(data.msg)
                            loadData()
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err = JSON.parse(xhr.responseText);
                        msg_error(err.msg);
                    }
                })
            } else if (result.isDenied) {
                return false;
            }
        })
    });

    function loadData() {
        $('#gallery').DataTable({
            destroy: true,
            serverSide: true,
            processing: true,
            ajax: "{{ route('gallery.datatables') }}",
            columns: [
                
                // {data: 'thumbnail', orderable: false, searchable: false},
                {data: 'image', orderable: false, searchable: false},
                {data: 'description', orderable: false},
                {data: 'createdAt'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            dom: "<'row'<'col-sm-6'i><'col-sm-6'f>><'table-responsive'tr><'row'<'col-sm-6'l><'col-sm-6'p>>",
            language: {
                paginate: {
                    previous: "&laquo;",
                    next: "&raquo;"
                },
                search: "_INPUT_",
                searchPlaceholder: "Cari Data"
            }
        });
    }

    loadData();
});
</script>
@endpush
