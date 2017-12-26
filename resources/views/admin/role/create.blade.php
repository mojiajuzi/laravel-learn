@extends('layouts.app')

@section('content')
<h2>创建角色</h2>
@include('layouts.errors')
<form class="form-horizontal" method="POST" action="{{action('RoleController@store')}}">
{{ csrf_field() }}
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">角色名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="角色名称">
    </div>
  </div>
  <div class="form-group">
    <label for="display_name" class="col-sm-2 control-label">显示名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="display_name" name="display_name" placeholder="角色显示名称">
    </div>
  </div>
  <div class="form-group">
    <label for="desc" class="col-sm-2 control-label">角色描述</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="desc" name="description" placeholder="角色显示名称">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">创建</button>
    </div>
  </div>
</form>
@endsection