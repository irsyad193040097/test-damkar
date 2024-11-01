@extends('backend.layout')
@section('content')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between mb-3">
                    <h4 class="header-title">Kontak Pesan</h4>
                </div>
                <table id="contact" data-tables="true" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nama pengirim</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
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
    function loadData() {
        $('#contact').DataTable({
            destroy: true,
            serverSide: true,
            processing: true,
            ajax: "{{ route('contactMessage.datatables') }}",
            columns: [
                {data: 'name'},
                {data: 'email'},
                {data: 'phone'},
                {data: 'subject'},
                {data: 'message', orderable: false, searchable: false},
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
