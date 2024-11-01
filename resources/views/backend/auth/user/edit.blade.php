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
            <h4 class="page-title">Pengguna</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Edit Pengguna</h4>
                <form class="needs-validation" method="post" action="{{ route('user.update', ['id' => $data->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf
                    <div class="position-relative mt-4 mb-3">
                        <div class="col-sm-12 mt-2">
                            <img src="{{ Storage::url($data->avatar) }}" id="showgambar" class="img-fluid" width="200px">
                        </div>
                        <label class="form-label">Logo</label>
                        <div class="input-group">
                            <input type="file" id="inputgambar" class="form-control @error('avatar') is-invalid @enderror" name="avatar" />
                        </div>
                        @error('avatar')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" />
                                </div>
                                @error('name')
                                    <span class="help-block">
                                        <code>{{ $message }}</code>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" />
                                </div>
                                @error('email')
                                    <span class="help-block">
                                        <code>{{ $message }}</code>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="position-relative mt-4 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Password *(Kosongkan jika tidak merubah password)</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('name') is-invalid @enderror" name="password" />
                            </div>
                            @error('password')
                                <span class="help-block">
                                    <code>{{ $message }}</code>
                                </span>
                            @enderror
                        </div>
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
