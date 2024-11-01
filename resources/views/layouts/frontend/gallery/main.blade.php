@extends('layouts.frontend.app')
@section('content')
@section('title', 'Galeri')
<main id="main">
    <section id="news" class="news sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Galeri</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                @forelse($data as $gallery)
                    <div class="col-xl-3 col-md-6 mb-3" style="height: auto">
                        <article>
                            <div class="post-img">
                                <img src="{{ Storage::url($gallery->image)  }}" alt="" class="img-fluid">
                            </div>

                            <div style="text-align: justify" class="description fw-bold">
                                {{ $gallery->description }}
                            </div>
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
