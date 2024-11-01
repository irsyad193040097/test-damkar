@extends('backend.layout')
@section('content')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Update Kategori</h4>
                <form class="needs-validation" method="post" action="{{ route('category.update', ['id' => $data->id]) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="position-relative mt-4 mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" placeholder="Judul" name="category_name" value="{{ $data->category_name }}" />
                        @error('category_name')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row-->
@endsection

@push('custom-scripts')
<script>

</script>

@endpush
