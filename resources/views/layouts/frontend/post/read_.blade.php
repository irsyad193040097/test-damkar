@extends('layouts.frontend.app')
@section('content')
<link href="{{ asset('assets/css/post.css') }}">
<style>
    .img-responsive {
        margin-right: 15px;
        margin-left: 15px;
    }
    .align-left {
        float: left;
    }
    
</style>
<main id="main">
    <section class="sections-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-8 col-sm-12 pt-3 mb-4" style="background-color: #fff;">
                    <article>
                        <div class="post-img">
                            <img src="{{ env('APP_URL') . Storage::url($data->thumbnail) }}" alt="" class="img-fluid">
                        </div>

                        <div class="detail-content">
                            <div class="total-views d-flex">
                                <div class="total-views-read">
                                    {{ views($data)->count() }}
                                    <span>Dilihat</span>
                                </div>

                                <ul class="list-inline pull-right">
                                    <li class="list-inline-item">
                                        @foreach($data->postCategories as $cat)
                                            <a href="{{ route('category.main', ['slug' => $cat->category->slug]) }}">{{ $cat->category->category_name }}</a>
                                        @endforeach
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="bi bi-calendar"></i> {{ Carbon\Carbon::parse($data->published_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss') }} |
                                    </li>
                                    <li class="list-inline-item">
                                        @foreach($data->postAuthors as $post)
                                        <a href="#">{{ $post->author->name }}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>

                            <h2 class="title mb-2">
                                {{ $data->title }}
                            </h2>

                            {!! $data->description !!}
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h6>Informasi Lainnya</h6>
                    @foreach($otherPosts as $other)
                        <div class="card border-0 mt-3" style="width: 100%;">
                            <div class="card-body text-left">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ env('APP_URL') . Storage::url($other->thumbnail) }}" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="text-dark" href="{{ route('post.read', ['slug' => $other->slug]) }}">
                                            <h6 class="card-title">
                                                {{ $other->title }}
                                            </h6>
                                        </a>
                                        <p style="font-size: 12px" class="text-date">
                                            <i class="bi bi-person-fill"></i> 
                                            @foreach($other->postAuthors as $pa)
                                                {{ $pa->author->name }}
                                            @endforeach
                                            |
                                            <i class="bi bi-time"></i> {{ Carbon\Carbon::parse($data->uploaded_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection