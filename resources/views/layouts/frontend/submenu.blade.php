@foreach($menu->childs as $child)
    <li class="dropdown">
        <a href="{{ $child->type == 'static' ? url(env('APP_URL') . $child->url) : route('page.content', ['slug' => $child->slug]) }}"><span>{{ $child->title }}</span><i class="{{ count($child->childs) ? 'bi-chevron-right' :'' }}"></i></a>
            @if(count($child->childs))
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#" style="position: absolute;">
                            @include('layouts.frontend.submenu',['menu' => $child])
                        </a>
                    </li>
                </ul>
            @endif
        </a>
    </li>
@endforeach