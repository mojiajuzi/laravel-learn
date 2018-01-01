@extends('layouts.app')
@section('content')
<div class="col-md-7">
        <h4>申请加入学校</h4>
 </div>
 <div class="col-md-8 col-md-offset-1">
    @include('layouts.errors')
    <form class="form-horizontal" method="POST" action="{{action('SchooleTeacherController@apply')}}" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                    <label for="schoole_en_name" class="col-sm-2 control-label">学校</label>
                    <div class="col-sm-10">
                     <select name="schoole_uuid" id="">
                         {{--  TODO:暂时不做下拉搜索  --}}
                         <option value="0">选择学校</option>
                         @if(isset($schooleList))
                         @foreach($schooleList as $schoole)
                            <option value="{{$schoole->schoole_uuid}}">{{$schoole->schoole_name}}</option>
                          @endforeach
                        @endif
                     </select>
                    </div>
             </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">提交申请</button>
                </div>
              </div>
            </form>
 </div>
@endsection