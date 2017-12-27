@extends('layouts.app')

@section('content')
<h2>学校编辑</h2>
@include('layouts.errors')
<form class="form-horizontal" method="POST" action="{{ URL::to('schooles/'.$schoole->id) }}">
{{ csrf_field() }}
{{ method_field('PUT')}}
  <div class="form-group">
    <label for="schoole_name" class="col-sm-2 control-label">全称</label>
    <div class="col-sm-10">
      <span>{{$schoole->schoole_name}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="schoole_simple_name" class="col-sm-2 control-label">简称</label>
    <div class="col-sm-10">
      <span>{{$schoole->schoole_simple_name}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="schoole_en_name" class="col-sm-2 control-label">英文名</label>
    <div class="col-sm-10">
      <span>{{$schoole->schoole_en_name }}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="schoole_code" class="col-sm-2 control-label">代码</label>
    <div class="col-sm-10">
      <span>{{$schoole->schoole_code }}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="schoole_address" class="col-sm-2 control-label">地址</label>
    <div class="col-sm-10">
      <span>{{$schoole->schoole_address }}</span>
    </div>
  </div>
</form>
@endsection