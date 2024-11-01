@extends('backend.layout')
@section('content')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between mb-3">
                    <h4 class="header-title">Data Kategori</h4>
                    <a class="btn btn-primary text-white" href="{{ route('category.create') }}"><i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <table id="postCategory" data-tables="true" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
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
                    url: "{{ url('admin/category/delete')  }}" + '/' + $(this).attr('data-id'),
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
        $('#postCategory').DataTable({
            destroy: true,
            serverSide: true,
            processing: true,
            ajax: "{{ route('category.datatables') }}",
            columns: [
                
                // {data: 'thumbnail', orderable: false, searchable: false},
                {data: 'category_name', orderable: false, searchable: false},
                {data: 'slug', orderable: false, searchable: false},
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
