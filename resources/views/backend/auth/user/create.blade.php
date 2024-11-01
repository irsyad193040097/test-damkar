@extends('backend.layout')

@section('content')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Tambah Pengguna</h4>
                <form class="needs-validation" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="position-relative mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" name="name" />
                        @error('name')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat" value="{{ old('address') }}" name="address" />
                        @error('address')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}" name="place_of_birth" />
                        @error('place_of_birth')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}" name="date_of_birth" />
                        @error('date_of_birth')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-3">
                        
                        <label class="form-label">Avatar</label>
                        <div class="input-group">
                            <div class="col-sm-12 mb-2">
                                <img id="showgambar" style="max-width:600px;max-height:300px;float:left;" />
                            </div>
                            <input type="file" id="inputgambar" class="form-control @error('avatar') is-invalid @enderror" name="avatar" />
                        </div>
                        @error('avatar')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-3">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" placeholder="Jelaskan tentang saya...." name="bio">{{ old('bio') }}</textarea>
                        @error('bio')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" name="email" />
                        @error('email')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mt-4 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" />
                        @error('password')
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