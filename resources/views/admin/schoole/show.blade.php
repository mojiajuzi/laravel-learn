@extends('layouts.app')

@section('content')
@include('layouts.errors')
<div class="panel panel-default col-sm-7 col-sm-offset-2">
  <div class="panel-heading">学校信息</div>
  <div class="panel-body">
    <div class="col-sm-6">
          <label for="" class="col-sm-3">全称：</label>
          <div  class="col-sm-7">{{$schoole->schoole_name}}</div>
      </div>
      <div class="col-sm-6">
          <label for="" class="col-sm-3">简称：</label>
          <div  class="col-sm-9">{{$schoole->schoole_simple_name}}</div>
      </div>
      <div class="col-sm-6">
          <label for="" class="col-sm-3">英文名：</label>
          <div  class="col-sm-7">{{$schoole->schoole_en_name}}</div>
      </div>
      <div class="col-sm-6">
          <label for="" class="col-sm-3">编码：</label>
          <div  class="col-sm-9">{{$schoole->schoole_code }}</div>
      </div>
      <div  class="col-sm-6">
      <label for="" class="col-sm-3">地址：</label>
          <div  class="col-sm-9">{{$schoole->schoole_address }}</div>
      </div>
  </div>
</div>
@endsection