<div class="modal-body">
<form class="form-horizontal" method="POST" action="{{action('DepartmentController@update', ['id' => $department->id])}}" role="form" id="edit_form">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        <div class="form-group">
                <label for="schoole_en_name" class="col-sm-2 control-label">上级</label>
                <div class="col-sm-10">
                    <select name="department_parent_id" id="">
                        <option value="0">无</option>
                        @if(isset($departmentList))
                        @foreach($departmentList as $detail)
                            @if($detail->id != $department->id)
                                 <option value="{{$detail->id}}" @if($detail->id == $department->department_parent_id) selected  @endif>{{$detail->department_name}}</option>
                            @endif
                        @endforeach
                    @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label for="department_full_name" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="department_full_name" name="department_full_name" value="{{$department->department_full_name}}" placeholder="简称">
            </div>
            </div>
            <div class="form-group">
            <label for="department_name" class="col-sm-2 control-label">简称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="department_name" value="{{$department->department_name}}" placeholder="部门简称">
            </div>
            </div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
<button type="button" class="btn btn-primary" id="create_submit">提交</button>
</div>