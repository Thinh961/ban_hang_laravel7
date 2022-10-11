@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách vai trò</h5>
            </div>
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="card-body">
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Mô tả</th>
                            {{-- <th scope="col" style="width:800px">Các quyền</th> --}}
                             @canany(['admin.role.edit', 'admin.role.destroy'])
                            <th scope="col">Tác vụ</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @if ($roles->count() > 0)
                            <?php $t = 0; ?>
                            @foreach ($roles as $item)
                                <?php $t++; ?>
                                <tr>
                                    <td scope="row">{{ $t }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    {{-- <td>
                                        @foreach ($item->permissions as $permission)
                                            <span class="badge badge-success">{{ $permission->name }}
                                                {{ $permission->permissionParent->name }}</span>
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        @can('admin.role.edit')
                                            <a href="{{ Route('admin.role.edit', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('admin.role.destroy')
                                            <a href="{{ Route('admin.role.destroy', $item->id) }}"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa')"
                                                class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                                data-placement="top" title="Trash"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center bg-white">Hiện không có vai trò nào</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
