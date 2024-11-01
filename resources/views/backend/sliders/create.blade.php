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
            <h4 class="page-title">Tambah Sliders</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Tambah Sliders</h4>
                <form class="needs-validation" method="post" action="{{ route('sliders.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                    <div class="position-relative mt-4 mb-3">
                        <div class="col-sm-12 mt-2">
                            <img id="showgambar" class="img-fluid" width="200px">
                        </div>
                        <label class="form-label">Image</label>
                        <div class="input-group">
                            <input type="file" id="inputgambar" class="form-control @error('image') is-invalid @enderror" name="image" />
                        </div>
                        @error('image')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Submit</button>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection
@push('custom-scripts')
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function() {
        readURL(this);
    });
</script>
@endpush