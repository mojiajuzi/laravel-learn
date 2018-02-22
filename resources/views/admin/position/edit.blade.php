<div class="modal-body">
<form class="form-horizontal" method="POST" action="{{action('PositionController@update', ['id' => $position->id])}}" role="form" id="edit_form">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        <input type="hidden" name="department_id" value="{{ $position->department_id}}">
         {{--  职位名称  --}}
          <div class="form-group">
            <label for="position_name" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="position_name" name="position_name" value="{{ $position->position_name}}" placeholder="职位名称">
            </div>
          </div>
         {{--  是否为部门负责人  --}}
         <div class="form-group">
                <label for="schoole_en_name" class="col-sm-2 control-label">领导</label>
                <div>
                    <label class="radio-inline">
                            <input type="radio" name="department_master" @if( 0 == $position->department_master) checked @endif value="0">否
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="department_master" @if( 1 == $position->department_master) checked @endif value="1"> 是
                        </label>
                </div>
         </div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
<button type="button" class="btn btn-primary" id="create_submit">提交</button>
</div>