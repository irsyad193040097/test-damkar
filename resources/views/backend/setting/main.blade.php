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
            <h4 class="page-title">Pengaturan</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Pengaturan</h4>
                <form class="needs-validation" method="post" action="{{ route('setting.store', ['id' => $data->id]) }}" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="position-relative mt-4 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Nama Website</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="appname" value="{{ $data->appname }}" />
                            </div>
                        </div>
                    </div>

                    <div class="position-relative mt-4 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Meta Description</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="meta_description" value="{{ $data->meta_description }}" />
                            </div>
                        </div>
                    </div>

                    <div class="position-relative mt-4 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Meta Keywords</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="meta_keywords" value="{{ $data->meta_keywords }}" />
                            </div>
                        </div>
                    </div>

                    <div class="position-relative mt-4 mb-3">
                        <div class="col-sm-12 mt-2">
                            <img src="{{ Storage::url($data->logo_1) }}" class="img-fluid" width="200px">
                        </div>
                        <label class="form-label">Logo</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="logo_1" />
                        </div>
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <div class="col-sm-12 mt-2">
                            <img src="{{ Storage::url($data->logo_2) }}" class="img-fluid" width="200px">
                        </div>
                        <label class="form-label">Banner</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="logo_2" />
                        </div>
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <div class="col-sm-12 mt-2">
                            <img src="{{ Storage::url($data->logo_3) }}" class="img-fluid" width="200px">
                        </div>
                        <label class="form-label">Foto Bupati</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="logo_3" />
                        </div>
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <label for="validationTooltip02" class="form-label">Alamat</label>
                        <textarea class="form-control" name="office_address" id="validationTooltip02" rows="5">{{ $data->office_address }}</textarea>
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Telepon</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" value="{{ $data->phone }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" value="{{ $data->email }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Fax</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="fax" value="{{ $data->fax }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Facebook</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="facebook" value="{{ $data->facebook }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Instagram</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="instagram" value="{{ $data->instagram }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Twitter</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative mt-4 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Warna</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="theme_color" id="colorpicker-default" value="{{ $data->theme_color }}" />
                                </div>
                            </div>
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
