@extends('backend.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex align-items-center mb-3">
                    <div class="input-group input-group-sm">
                        <input type="text" readonly value="{{ date('d F Y') }}" class="form-control border-0">
                        <span class="input-group-text bg-blue border-blue text-white">
                            <i class="mdi mdi-calendar-range"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Tambah Permissions</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Tambah Permissions</h4>
                <form class="needs-validation" method="post" action="{{ url('role/add_permissions/'.$data->id) }}" novalidate>
                @csrf
                <div class="row">
                    @foreach($permissions as $permission)
                    <div class="col-md-4">
                        <div class="form-check">
                            {{-- <input type="hidden" class="form-check-input" value="{{ $permission->name }}" name="name[]" id="customCheck{{ $permission->id }}"> --}}
                            <input type="checkbox" class="form-check-input" value="{{ $permission->name }}" name="name[]" id="customCheck{{ $permission->id }}" {{ $data->hasPermissionTo($permission->name) ? 'checked' : ''  }}>
                            <label class="form-check-label" for="customCheck{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                    <button class="btn btn-primary mt-3" type="submit">Submit</button>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection
