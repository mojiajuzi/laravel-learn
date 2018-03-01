<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">基础信息修改</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_edit_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/basic')}}/{{$basic->id}}">
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">姓名：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="teacher_name" value="{{$basic->teacher_name or ''}}" />
        </div>
    </div>
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">性别：</label>
        @foreach($genderArr as $gk => $gender)
        <label class="radio-inline">
        <input type="radio" name="gender" id="gender{{$gk}}" value="{{$gk}}" @if($gk == $basic->gender) checked  @endif> {{$gender}}
        </label>
        @endforeach
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">出生日期：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" id="hpdate"  name="birthday" value="{{$basic->birthday or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">文化程度：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="culture_type">
                @foreach($cultureArr as $ck => $culture)
                <option value="{{$ck}}" @if($ck == $basic->culture_type) selected @endif>{{$culture}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">手机：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="mobile" value="{{$basic->mobile or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">邮箱：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="email" value="{{$basic->email or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">民族：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="nation" value="{{$basic->nation or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">籍贯：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="native_place" value="{{$basic->native_place or ''}}" placeholder="省/市/县/镇(乡)/村/号"/>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">证件类型：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="id_type">
                @foreach($cardArr as $ck => $card)
                <option value="{{$ck}}" @if($ck == $basic->id_type) selected @endif>{{$card}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">证件号码：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="id_card" value="{{$basic->id_card or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">婚姻状态：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="martial">
                @foreach($marryArr as $mk => $marry)
                <option value="{{$mk}}" @if($mk == $basic->martial) selected @endif>{{$marry}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">政治面貌：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="political">
                @foreach($politicalArr as $pk => $political)
                <option value="{{$pk}}" @if($mk == $basic->political) selected @endif>{{$political}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">户籍类型：</label>
        <div  class="col-sm-9">
            <select class="form-control" name="permananent_address_type">
                @foreach($permananentArr as $pk => $permananent)
                <option value="{{$pk}}" @if($pk == $basic->permananent_address_type) selected @endif>{{$permananent}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">户籍：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="permanent_address" value="{{$basic->permanent_address or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">户籍所在地：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="registered_redidence" value="{{$basic->registered_redidence or ''}}" placeholder="省/市/县/镇(乡)/村/号"/>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">通讯地址：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="local_address" value="{{$basic->local_address or ''}}" />
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary edit_teacher_operator">更新</button>
</div>
<script>
    $("#hpdate").datepicker({
        format: "yyyy-mm-dd",
        StartDate: "1980-01-01"
    });
</script>