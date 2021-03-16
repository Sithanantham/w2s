@extends('layouts.adminlayout')

@section('breadcrumb')

    <div class="col-xl-12 col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users_list') }}">Users List</a></li>
                <li class="breadcrumb-item active"><a href="#">Add User</a></li>
            </ol>
        </nav>
    </div>

@endsection
@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
        </div>
            <!-- Card Body -->
            <div class="card-body">
            <form id="myform" name="frm" method="post" action="{{ route('save_user') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{old('name')}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="conf_password">Confirm Password</label>
                        <input type="password" name="conf_password" class="form-control" id="conf_password" value="{{old('conf_password')}}">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone')}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="role_id">Role</label>
                        <select name="role_id" class="form-control" id="role_id" value="{{old('role_id')}}">
                        <option disabled selected>Select Role</option>
                    @foreach($role as $roles)
                        <option value="{{$roles->id}}">{{ucwords($roles->role)}}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="menu">Menu</label><br>
                        @foreach($menu as $menus)
                        <input type="checkbox" name="menu_id[]" id="menu" value="{{$menus->menu}}">{{ucwords($menus->menu)}} &nbsp;
                    @endforeach
                    </div>
                </div>                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label><br>
                        <input type="radio" name="status" value="1" id="status" @if(old('status') == '1') checked @endif required checked> &nbsp; Active &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="0" id="status" @if(old('status') == '0') checked @endif required> &nbsp; Inactive
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
    </div>
</div>

<script>
    /* $(document).ready(function(){
        $("#myform").validate({
            rules:{
                name:{
                    required
                }
            }
        });
    }); */

    $(document).ready(function () {

$('#myform').validate({ // initialize the plugin
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        }
    }
});

});
</script>

@endsection