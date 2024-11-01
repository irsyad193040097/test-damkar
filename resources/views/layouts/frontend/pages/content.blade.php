@extends('layouts.frontend.app')
@section('content')
@section('title', $page->title)
<main id="main">
    <section class="sections-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-8 col-sm-12 p-4 mb-4" style="background-color: #fff;">
                    <h2 class="title">
                        {{ $page->title }}
                    </h2>
                    <p class="post-item">
                        {!! $page->description !!}
                    </p>

                    @if($page->slug == 'kontak-kami')
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">Peta Lokasi</h4>
                            <div class="widget widget__category">
                                <iframe width="100%" height="500" src="https://maps.google.com/maps?q=Volunteer Fire Rescue KBB&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
							</div>
                        </aside>
                    @endif
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Berita</h3>
                        </div>
                        <div class="widget-body">
                            @foreach(ApplicationHelper::otherPost() as $other)
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
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
