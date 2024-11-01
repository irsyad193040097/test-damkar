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
            <h4 class="page-title">Tambah Pengumuman</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Tambah Pengumuman</h4>
                <form class="needs-validation" method="post" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="position-relative mt-4 mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul" name="judul" value="{{ old('judul') }}" />
                    @error('judul')
                        <span class="help-block">
                            <code>{{ $message }}</code>
                        </span>
                    @enderror
                </div>
                <div class="position-relative mt-4 mb-3">
                    <label class="form-label">Tanggal Pengumuman</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="tanggal" name="tanggal" value="{{ old('tanggal') }}" />
                    @error('tanggal')
                        <span class="help-block">
                            <code>{{ $message }}</code>
                        </span>
                    @enderror
                </div>
                <div class="position-relative mt-4 mb-3">
                    <label class="form-label">Isi Pengumuman</label>
                    <textarea class="form-control @error('isi_pengumuman') is-invalid @enderror" name="isi_pengumuman" placeholder="Deskripsi">{{ old('isi_pengumuman') }}</textarea>
                    @error('isi_pengumuman')
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

<script>
    $(function() {
        tinymce.init({
            selector: "textarea",
            height: 800,
            image_caption: true,
            content_style: ".img-fluid { margin-right: 15px; }",
            image_class_list: [
                {
                    title: 'img-fluid',
                    value: 'img-fluid'
                },
            ],
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"
                , "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"
                , "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons | charmap",
            image_title: true,
            relative_urls : false,
            remove_script_host : true,
            document_base_url : "env('APP_URL')",
            automatic_uploads: true,
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ url('/upload') }}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    })

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

    $(document).ready(function(){
        $('#categories').selectize();
        $('#authors').selectize();
    });

    // $('#customSwitch1').change(function() {
    //     if ($(this).is(':checked')) {
    //         $(this).val('0');
    //     }
    // })

</script>
@endpush