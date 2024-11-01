@extends('layouts.frontend.app')
@section('content')
@section('title', $data->title)
<style>
    .img-fluid {
        margin-right: 15px;
        margin-left: 15px;
    }
    .align-left {
        float: left;
    }

</style>
<main id="main">
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{ Storage::url($data->thumbnail) }}" alt="" class="img-fluid">
                        </div>
                        <div class="article-title">
                            <h6>
                                <a href="{{ route('category.main', ['slug' => $data->postCategory->slug]) }}">{{ $data->postCategory->category_name }}</a>
                                |
                                <span><i class="bi bi-calendar"></i> {{ Carbon\Carbon::parse($data->published_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss') }}</span>
                            </h6>
                            <h2>{{ $data->title }}</h2>

                            <div class="media d-flex align-items-center gap-2">
                                @foreach($data->postAuthors as $post)
                                <div class="avatar">
                                    <img src="{{ Storage::url($post->author->avatar) }}" title="" alt="">
                                </div>
                                <div class="media-body mr-2">
                                    <label>{{ $post->author->name }}</label>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="article-content">
                            {!! $data->description !!}
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- End Author -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Berita Lainnya</h3>
                        </div>
                        <div class="widget-body">
                            @foreach(ApplicationHelper::otherPost()->whereNotIn('id', [$data->id]) as $other)
                                <div class="latest-post-aside media">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="lpa-right">
                                                <a href="{{ route('post.read', ['slug' => $other->slug]) }}">
                                                    <img src="{{ Storage::url($other->thumbnail) }}" title="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="{{ route('post.read', ['slug' => $other->slug]) }}">{{ $other->title }}</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="date" href="#">
                                                        {{ Carbon\Carbon::parse($other->uploaded_at)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Latest Post -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
