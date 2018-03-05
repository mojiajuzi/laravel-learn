<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">教育经历修改</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_edit_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/education')}}">
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学校名称：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="schoole_name" value="{{$education->schoole_name}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">开始日期：</label>
         <div  class="col-sm-9">
           <input type="text" class="hpdate form-control"  name="start_at" value="{{$education->start_at}}" />
         </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">结束日期：</label>

        <div  class="col-sm-9">
           <input type="text" class="hpdate form-control" name="end_at" value="{{$education->end_at}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">教育类型：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="education_type">
                @foreach($majorArr as $mk => $major)
                <option value="{{$mk}}" @if($mk == $education->education_type) selected  @endif>{{$major}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">专业：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="major" value="{{$education->major}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学历：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="culture">
                <option value="0">无</option>
                @foreach($cultureArr as $ck => $culture)
                <option value="{{$ck}}" @if($ck == $education->culture) selected @endif>{{$culture}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学历编号</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="culture_number" value="{{$education->cluture_number}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学位：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="degree">
                <option value="0">无</option>
                @foreach($degreeArr as $dk => $degree)
                <option value="{{$dk}}" @if($education->degree == $dk) selected @endif >{{$degree}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学位编号</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="degree_number" value="{{$education->degree_number}}" placeholder=""/>
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary edit_teacher_operator">修改</button>
</div>