@extends('backend.layout')
@section('content')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between mb-3">
                    <h4 class="header-title">Data Pengumuman</h4>
                    <a class="btn btn-primary text-white" href="{{ route('pengumuman.create') }}"><i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <table id="gallery" data-tables="true" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
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
                    url: "{{ url('admin/pengumuman/delete')  }}" + '/' + $(this).attr('data-id'),
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
            ajax: "{{ route('pengumuman.datatables') }}",
            columns: [
                
                // {data: 'thumbnail', orderable: false, searchable: false},
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'judul', orderable: false, searchable: false},
                {data: 'tgl', orderable: false, searchable: false},
                {data: 'status'},
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
