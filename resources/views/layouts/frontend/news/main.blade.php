@extends('layouts.frontend.app')
@section('content')
@section('title', 'Daftar Berita')
<main id="main">
    <section id="news" class="news sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Berita</h2>
            </div>

            <div class="row gy-4">
                @forelse($data as $post)
                    <div class="col-xl-3 col-md-6 mb-3" style="height: auto">
                        <article>
                        <div class="post-img">
                            <img src="{{ Storage::url($post->thumbnail)  }}" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">
                            <span class="badge bg-success"> {{ $post->postCategory->category_name }} </span> | {{ ApplicationHelper::getFormatTime($post->uploaded_at) }}
                        </p>

                        <h2 class="title">
                            <a href="{{ route('post.read', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                        </h2>

                        <div style="text-align: justify" class="description">
                            {!! ApplicationHelper::getNWords($post->description, 20) !!}
                        </div>

                        <a href="{{ route('post.read', ['slug' => $post->slug]) }}" class="readmore">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        </article>
                    </div>
                @empty
                    <div class="col-xl-12 text-center" style="height: auto">
                        <h1>No Data Available</h1>
                    </div>
                @endforelse
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section><!-- End Our Services Section -->
</main>
@endsection
