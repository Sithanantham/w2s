@extends('layouts.adminlayout')
@section('breadcrumb')

    <div class="col-xl-12 col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('add_menu') }}">Add Menu</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu_list') }}">Menus List</a></li>
                <li class="breadcrumb-item active"><a href="#">Edit Menu</a></li>
            </ol>
        </nav>
    </div>

@endsection
@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update Menu</h6>
        </div>
            <!-- Card Body -->
            <div class="card-body">
            <form name="frm" method="post" action="{{ route('update_menu', $data->id) }}" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="menu">Menu</label>
                    <input type="text" name="menu" class="form-control" id="menu" placeholder="menu" value="{{ $data->menu }}" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="link">Link</label>
                    <input type="text" name="link" class="form-control" id="link" placeholder="Link" value="{{ $data->link }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="status">Status</label><br>
                    <input type="radio" name="status" value="1" id="status" <?php if($data->status == 1){ echo "checked"; } ?>> &nbsp; Active &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" id="status" <?php if($data->status == 0){ echo "checked"; } ?>> &nbsp; Inactive
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Menu</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
    </div>
</div>


@endsection