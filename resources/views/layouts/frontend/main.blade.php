@extends('layouts.frontend.app')
@section('content')

<div class="gray-bg">
    <div class="container-fluid mt-2">
        <div class="rounded-3 ">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
					@php $no_slide = 1; @endphp
                    @foreach ($sliders as $slide)
                    <div class="carousel-item <?php if($no_slide == 1){ echo "active"; } ?>" style="">
                        <img
                            src="{{ Storage::url($slide->gambar) }}" class="img-fluid w-100">
                    </div>
					@php $no_slide++; @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-info" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-info" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8 m-15px-tb blog-aside">
                <div class="widget">
                    <div class="widget-title" style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
                        <h3 class="text-white">Berita Terbaru</h3>
                    </div>
                    <div class="widget-body">
                        @foreach($latestNews as $news)
                        <div class="row gx-5">
                            <div class="col-md-5 mb-4">
                                <div class="bg-image hover-overlay ripple shadow-2-strong rounded-3"
                                    data-mdb-ripple-color="light">
                                    <img src="{{ Storage::url($news->thumbnail) }}"
                                        class="img-fluid rounded-3" />
                                </div>
                            </div>

                            <div class="col-md-7 mb-4">
                                <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">{{
                                    $news->postCategory->category_name }}</span>
                                <h5><strong><a href="{{ route('post.read', ['slug' => $news->slug]) }}"> {{ $news->title
                                            }}</a></strong></h5>
                                <p class="text-muted"><i class="fa fa-calendar"></i> {{
                                    Carbon\Carbon::parse($news->uploaded_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss')
                                    }}</p>
                                <p class="text-muted">
                                    {!! Str::limit(strip_tags($news->description), $limit = 250, $end = '.....') !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 m-15px-tb blog-aside">
                @include('layouts.frontend.sidebar')
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>

    $(document).ready(function(){
		$('#modalpengumuman').on('show.bs.modal', function (e) {
			//var url = '{{URL::to('dashboard/getdata')}}';
			var rowid = $(e.relatedTarget).data('id');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type : 'GET',
				url: "{{ url('getpengumuman')}}", //Here you will fetch records
				data :  'rowid='+ rowid, //Pass $id
				success : function(data){
				$('.fetched-data2').html(data);//Show fetched data from database
				}
			});
		});
	});

</script>
@endpush
