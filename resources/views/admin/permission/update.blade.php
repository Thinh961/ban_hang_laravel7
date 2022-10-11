@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Thêm danh mục
                    </div>
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ Route('admin.permission.update', $permission->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="name" value="{{ $permission->name }}"
                                    id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Description</label>
                                <input class="form-control" type="text" name="description"
                                    value="{{ $permission->description }}" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="">Quyền cha</label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="">Chọn danh mục</option>
                                    @if (!empty($permisions))
                                        @foreach ($permisions as $item)
                                            @if ($item->parent_id == 0)
                                                <option {{ $permission->parent_id == $item->id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Hiện không có danh mục nào</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Thao tac</label>
                                <select class="form-control" name="key_code" id="">
                                    <option value="">Chọn danh mục</option>
                                    @if (!empty($key_code))
                                        @foreach ($key_code as $item)
                                            <option {{ $permission->key_code == $item['name'] ? 'selected' : '' }}
                                                value="{{ $item['name'] }}">{{ $item['display_name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('key_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @can('admin.permission.update')
                                <button type="submit" value="Thêm mới" class="btn btn-primary">Cập nhật</button>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Mô tả quyền</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 0;
                                @endphp
                                @if (!empty($permisions))
                                    @foreach ($permisions as $item)
                                        @php
                                            $t++;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $t }}</th>
                                            <td>
                                                @if ($item->parent_id == 0)
                                                    <strong>{{ str_repeat('|---', $item->level) . $item->name }}</strong>
                                                @else
                                                    {{ str_repeat('|---', $item->level) . $item->name }}
                                                @endif
                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                @can('admin.permission.edit')
                                                    <a href="{{ Route('admin.permission.edit', $item->id) }}"
                                                        class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('admin.permission.destroy')
                                                    <a href="{{ Route('admin.permission.destroy', $item->id) }}"
                                                        class="btn btn-danger btn-sm rounded-0 text-white"
                                                        onclick="return confirm('Xóa danh mục sẽ xóa tất cả các bài viết của danh mục đó, bạn có chắc muốn xóa')"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        title="Delete"><i class="fa fa-trash"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center bg-white">Không có danh mục nào</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
