@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ Route('admin.role.store') }}" class="mb-4">
        <div id="content" class="container-fluid">
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm vai trò
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên vai trò</label>
                        <input class="form-control" value="" type="text" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Mô tả</label>
                        <input class="form-control" type="text" value="" name="description" id="desc">
                    </div>
                </div>
            </div>
            <div class="card text-white mb-2 mt-2">
                <div class="card-header text-primary">
                    <label>
                        <input type="checkbox" class="transform" id="selectall">
                        Chọn toàn bộ quyền
                    </label>
                </div>
            </div>
            @foreach ($permissions as $permission)
                <div class="card text-white mb-3">
                    <div class="card-header bg-success">
                        <label>
                            <input type="checkbox" class="wp_checkbox select transform">
                            {{ $permission->name }}
                        </label>
                    </div>
                    <div class="card-body text-primary">
                        <div class="row">
                            @foreach ($permission->permissionChild as $item)
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" value="{{ $item->id }}" name="permission_id[]"
                                            class="transform child_checkbox select">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            @can('admin.role.create')
                <button type="submit" name="btn-add" class="btn btn-primary">Thêm mới</button>
            @endcan
        </div>
    </form>
@endsection
