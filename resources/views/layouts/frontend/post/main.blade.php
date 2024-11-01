@extends('layouts.frontend.app')
@section('content')
<main id="main">
    <section id="news" class="news sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Daftar Berita</h2>
            </div>

            <div class="row gy-4">
                @for ($i = 1; $i < 9; $i++)
                <div class="col-xl-3 col-md-6 mb-3" style="height: auto">
                    <article>
                    <div class="post-img">
                        <img src="{{asset('assets/img/portfolio/app-1.jpg')}}" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">
                        <span class="badge bg-success"> Berita</span> | 24/10/2022 14:02
                    </p>

                    <h2 class="title">
                        <a href="{{ route('news.read') }}">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                    </h2>

                    <div class="description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....</p>
                    </div>

                    <a href="{{ route('news.read') }}" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
                @endfor
            </div>
        </div>
    </section><!-- End Our Services Section -->
</main>
@endsection