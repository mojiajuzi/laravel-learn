@extends('layouts.app')

@section('content')
@include('layouts.errors')

<div class="panel panel-default col-sm-6 col-sm-offset-2">
  <div class="panel-heading">创建学校</div>
  <div class="panel-body">
      <form class="form-horizontal" method="POST" action="{{action('SchooleController@store')}}">
    {{ csrf_field() }}
      <div class="form-group">
        <label for="schoole_name" class="col-sm-2 control-label">全称</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="schoole_name" value="{{old('schoole_name')}}" placeholder="学校全称">
        </div>
      </div>
      <div class="form-group">
        <label for="schoole_simple_name" class="col-sm-2 control-label">简称</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="schoole_simple_name" name="schoole_simple_name" value="{{old('schoole_simple_name')}}" placeholder="简称">
        </div>
      </div>
      <div class="form-group">
        <label for="schoole_en_name" class="col-sm-2 control-label">英文名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="schoole_en_name" name="schoole_en_name"　value="{{old('schoole_en_name')}}" placeholder="学校英文名称">
        </div>
      </div>
      <div class="form-group">
        <label for="schoole_code" class="col-sm-2 control-label">代码</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="schoole_code" name="schoole_code" value="{{old('schoole_code')}}" placeholder="学校代码">
        </div>
      </div>
      <div class="form-group">
        <label for="schoole_address" class="col-sm-2 control-label">地址</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="schoole_address" name="schoole_address" value="{{old('schoole_address')}}" placeholder="学校具体地址">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">创建</button>
        </div>
      </div>
    </form>
  </div>
  </div>
</div>
@endsection