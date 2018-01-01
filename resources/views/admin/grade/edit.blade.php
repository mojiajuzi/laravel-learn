<div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{action('GradeController@update', ['id' => $grade->id])}}" role="form" id="department_edit_form">
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="form-group">
                <label for="grade_full_name" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="grade_full_name" value="{{$grade->grade_full_name}}" placeholder="简称">
                </div>
                </div>
                <div class="form-group">
                <label for="department_name" class="col-sm-2 control-label">简称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="grade_name" value="{{$grade->grade_name}}" placeholder="年级简称">
                </div>
                </div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="department_submit">提交</button>
        </div>