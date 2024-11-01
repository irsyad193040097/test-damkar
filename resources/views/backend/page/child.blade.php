@if(!empty($page->childs))
    <ol class="dd-list list-group">
        @foreach($page->childs as $kk => $child)
            <li class="dd-item list-group-item" data-id="{{ $child['id'] }}" >
                <div class="dd-handle">{{ $child['title'] }}</div>
                <div class="dd-option-handle">
                    <a href="{{ route('page.edit', ['id' => $child['id']]) }}" class="btn btn-outline-success btn-sm" title="Edit">Edit</a> 
                    {{-- <a href="#" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="mdi mdi-delete"></i></a> --}}
                </div>
                
                @include('backend.page.child', ['page' => $child])
            </li>
        @endforeach
    </ol>
@endif