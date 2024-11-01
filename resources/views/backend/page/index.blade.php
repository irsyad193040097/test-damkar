@extends('backend.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/tree.css') }}">
{{-- https://thecodelearners.com/laravel-categories-subcategories-drag-drop-and-sort-using-jquery/ --}}
<div class="row mt-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between">
                    <h4>Struktur Menu</h4>
                    <form action="{{ route('page.save_nested') }}" method="post">
                        @csrf
                        <textarea style="display: none;" name="nested_page" id="nestable-output"></textarea>
                        <button type="submit" class="btn btn-primary" style="margin-top: 15px;" >Simpan Perubahan</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                
                <div class="dd" id="nestable-wrapper">
                    <ol class="dd-list list-group">
                        @foreach($pages as $k => $page)
                            <li class="dd-item list-group-item" data-id="{{ $page['id'] }}" >
                                <div class="dd-handle" >{{ $page['title'] }}</div>
                                <div class="dd-option-handle">
                                    <a href="{{ route('page.edit', ['id' => $page['id']]) }}" class="btn btn-outline-success btn-sm" title="Edit">Edit </a> 
                                    {{-- <a href="#" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="mdi mdi-delete"></i></a> --}}
                                </div>

                                @if(!empty($page->childs))
                                    @include('backend.page.child', ['page' => $page])
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <form class="needs-validation" method="post" action="{{ route('page.create') }}">
                @csrf
                <div class="card-header">
                    <div class="card-title"><h4>Tambah Halaman Menu</h4></div>
                </div>
                <div class="card-body">
                    <div class="position-relative mt-4 mb-3">
                        <label class="form-label">Judul Halaman</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" />
                        @error('title')
                            <span class="help-block">
                                <code>{{ $message }}</code>
                            </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tipe Menu</label>
                                <div class="input-group">
                                    <select name="type" class="form-select">
                                        <option value="static">Statis</option>
                                        <option value="dynamic">Dinamis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tipe Halaman</label>
                                <div class="input-group">
                                    <select name="page_type" class="form-select">
                                        <option value="page">Halaman</option>
                                        <option value="link">Custom Link</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px;" >Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
<script src="{{ asset('assets/js/jquery.nestable.js') }}"></script>
<script src="{{ asset('assets/js/tree.js') }}"></script>
@endpush
