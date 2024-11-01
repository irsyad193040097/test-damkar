<header id="header" class="header d-flex align-items-center">

<div class="container container-lg d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="">
    </a>
    <nav id="navbar" class="navbar">
        <ul>
            @foreach(ApplicationHelper::getMenu() as $menu)
                @if($menu->childs->count())
                    <li class="dropdown"><a href="#"><span>{{ $menu->title }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @if(count($menu->childs))
                                @include('layouts.frontend.submenu',['menu' => $menu])
                            @endif
                        </ul>
                    </li>
                @else
                    <li><a href="{{ $menu->type == 'static' ? url(env('APP_URL') . $menu->url) : route('page.content', ['slug' => $menu->slug]) }}">{{ $menu->title }}</a></li>
                @endif
            @endforeach
        </ul>
    </nav><!-- .navbar -->

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list text-dark"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header>
