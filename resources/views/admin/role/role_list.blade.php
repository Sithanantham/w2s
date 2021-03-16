@extends('layouts.adminlayout')

@section('content')
        <div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col-sm-6"><h6 class="m-0 font-weight-bold text-primary" style="width:50%">Roles List</h6></div>
      <div class="col-sm-6"><h6 class="m-0 font-weight-bold text-primary" style="float:right"> <a href="{{ route('add_role')}}"><button class="btn btn-primary">+ Add Role</button></a></h6></div>
    </div> 
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach($data as $datas)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ ucwords($datas->role) }}</td>
            <td>@if($datas->status == 1) {{"Active"}} @else {{"Inactive"}} @endif</td>
            <td> 
                <a href="{{ route('edit_role',$datas->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-pen"></i></a> 
                @if($datas->status == 1) 
                <a href="{{ route('status_role', $datas->id) }}" class="btn btn-success btn-circle btn-sm" onclick="return confirm('Are You Sure.. Do you want to change the status?')"><i class="fas fa-check"></i></a>
                @else
                <a href="{{ route('status_role', $datas->id) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are You Sure.. Do you want to change the status?')"><i class="fas fa-check"></i></a>
                @endif
                <a href="{{ route('delete_role',$datas->id)}}" class="btn btn-warning btn-circle btn-sm" onclick="return confirm('Are You Sure.. Do you want to delete the Role?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

@endsection