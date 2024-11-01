@extends('backend.layout')
@section('content')
<style>
    .img-responsive {
        margin-right: 15px;
        margin-left: 15px;
    }
    .align-left {
        float: left;
    }
    
</style>
<div class="row mt-2">
    <div class="col-12">
        <div class="card d-block">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="dripicons-dots-3"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Invite</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                    </div>
                </div>
                <!-- project title-->
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5>Tanggal Upload</h5>
                            <p>{{ Carbon\Carbon::parse($data->uploaded_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss') }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5>Tanggal Publish</h5>
                            <p>
                                @if($data->is_published == 1)
                                {{ Carbon\Carbon::parse($data->published_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss') }}
                                @else
                                -
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5>Kategori</h5>
                            @foreach($data->postCategories as $cat)
                                <div class="badge bg-primary text-light mb-3">{{ $cat->category->category_name }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5>Penulis</h5>
                            @foreach($data->postAuthors as $post)
                                <div class="badge bg-success text-light mb-3">{{ $post->author->name }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <img src="{{ env('APP_URL') . Storage::url($data->thumbnail) }}" class="img-fluid mb-2">

                <h2 class="mt-0 font-30">
                    {{ $data->title }}
                </h2>

                <p class="text-muted mb-2">
                    {!! $data->description !!}
                </p>

                {{-- <div class="mb-4">
                    <h5>Tags</h5>
                    <div class="text-uppercase">
                        <a href="#" class="badge badge-soft-primary me-1">Html</a>
                        <a href="#" class="badge badge-soft-primary me-1">Css</a>
                        <a href="#" class="badge badge-soft-primary me-1">Bootstrap</a>
                        <a href="#" class="badge badge-soft-primary me-1">JQuery</a>
                    </div>
                </div> --}}

            </div> <!-- end card-body-->
            
        </div> <!-- end card-->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection

@push('custom-scripts')
<script>

</script>

@endpush
