@extends('layouts.adminlayout')
@section('breadcrumb')

    <div class="col-xl-12 col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('add_user') }}">Add User</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users_list') }}">Users List</a></li>
                <li class="breadcrumb-item active"><a href="#">Edit User</a></li>
            </ol>
        </nav>
    </div>

@endsection
@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update User</h6>
        </div>
            <!-- Card Body -->
            <div class="card-body">
            <form name="frm" method="post" action="{{ route('update_user', $data->id) }}" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="User Name" value="{{ $data->name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}" placeholder="Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ $data->phone }}" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="role_id">Role</label>
                    <select name="role_id" class="form-control" id="role_id" value="{{old('role_id')}}">
                        <option disabled selected>Select Role</option>
                    @foreach($role as $roles)
                        <option value="{{$roles->id}}" <?php if($roles->id == $data->role_id){ echo 'selected'; } ?> >{{ucwords($roles->role)}}</option>
                    @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="menu">Menu</label><br>
                        @php
                            $menuData = @unserialize($data['menu_id']);
                            $menuData = (!empty($menuData) ? $menuData : []);
                        @endphp
                        @foreach($menu as $menus)
                            <input type="checkbox" name="menu_id[]" id="menu" value="{{$menus->menu}}" {{  (in_array($menus->menu, $menuData) ? ' checked' : '') }} >{{ucwords($menus->menu)}} &nbsp;
                        @endforeach
                    </div>
                </div>  
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="status">Status &nbsp;&nbsp;</label>
                    <input type="radio" name="status" value="1" <?php if($data->status == 1){ echo "checked"; } ?>> &nbsp; Active &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" <?php if($data->status == 0){ echo "checked"; } ?>> &nbsp; Inactive
                    
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
    </div>
</div>


@endsection