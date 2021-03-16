@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col-sm-6"><h6 class="m-0 font-weight-bold text-primary" style="width:100%">@php $data = unserialize($data['menu_id']); //dd($data); @endphp
        @foreach($menu as $menus)
        @if($data)
           <a href="{{ URL::to($menus->link) }}">{{$menus->menu}}</a>  /
        @endif
        @endforeach
    </h6></div>
    </div> 
  </div>
</div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col-sm-6"><h6 class="m-0 font-weight-bold text-primary" style="width:50%">Welcome {{ucwords(Auth::user()->name)}}</h6></div>
    </div> 
  </div>
  <div class="card-body">
    <div>
        @if(Auth::user()->role_id == 1)
           <b> You are a Superadmin.. You have all permissions..Here you can add the Menus, Users Roles and etc.,</b>
        @else
            <b> You are not a Superadmin...<br> 
            You Don't have any permission to add Menus and Roles.. You can only add the Users...<br>
            Superadmin only can add the Menus, Users Roles and etc.,</b>
        @endif
    </div>
  </div>
</div>
</div>

@endsection