@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật người dùng
            </div>
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}" id="name">
                        @error('name')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" readonly name="email" value="{{ $user->email }}"
                            id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="email">
                        @error('password')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Xác nhận mật khẩu</label>
                        <input class="form-control" type="password" name="password_confirmation" id="email">
                    </div>
                    @can('is-admin')
                        <div class="form-group">
                            <label for="">Nhóm quyền</label>
                            <select class="role-user form-control" name="role_id[]" multiple="multiple">
                                @foreach ($roles as $item)
                                    <option {{ $rolesChecked->contains('id', $item->id) ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    @can('admin.user.update')
                        <button type="submit" name="btn_update" class="btn btn-primary">Cập nhật</button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
@endsection
