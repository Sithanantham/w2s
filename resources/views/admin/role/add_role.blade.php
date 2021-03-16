@extends('layouts.adminlayout')

@section('breadcrumb')

    <div class="col-xl-12 col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('role_list') }}">Roles List</a></li>
                <li class="breadcrumb-item active"><a href="#">Add Role</a></li>
            </ol>
        </nav>
    </div>

@endsection
@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Role</h6>
        </div>
            <!-- Card Body -->
            <div class="card-body">
            <form id="myform" name="frm" method="post" action="{{ route('save_role') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" id="role" placeholder="Role" value="{{old('role')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="status">Status</label><br>
                    <input type="radio" name="status" value="1" id="status" @if(old('status') == '1') checked @endif required checked> &nbsp; Active &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" id="status" @if(old('status') == '0') checked @endif required> &nbsp; Inactive
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Role</button>
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
        role: {
            required: true
        }
    }
});

});
</script>

@endsection