@extends('backend.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex align-items-center mb-3">
                    <div class="input-group input-group-sm">
                        <input type="text" readonly value="{{ date('d F Y') }}" class="form-control border-0">
                        <span class="input-group-text bg-blue border-blue text-white">
                            <i class="mdi mdi-calendar-range"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Permission</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between mb-3">
                    <h4 class="header-title">Data Permission</h4>
                    <a class="btn btn-sm bg-pink text-white" href="{{ url('permission/create') }}">Create</a>
                </div>
                <table id="data" data-tables="true" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Permission</th>
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
                    url: "{{ url('permission/delete')  }}",
                    type: "POST",
                    data : {id: $(this).attr('data-id')},
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
        $('#data').DataTable({
            destroy: true,
            serverSide: true,
            processing: true,
            ajax: "{{url('/permission/datatables/')}}",
            columns: [
                {data: 'rownum', searchable: false},
                {data: 'name'},
                {data: 'guard_name'},
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
