<form class="form-horizontal" method="POST" action="{{action('PositionController@store')}}" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="department_id" value="{{$department->id}}">
         {{--  职位名称  --}}
          <div class="form-group">
            <label for="position_name" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="position_name" name="position_name" value="{{old('position_name')}}" placeholder="职位名称">
            </div>
          </div>
         {{--  是否为部门负责人  --}}
         <div class="form-group">
                <label for="schoole_en_name" class="col-sm-2 control-label">领导</label>
                <div>
                    <label class="radio-inline">
                            <input type="radio" name="department_master" checked value="0">否
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="department_master" value="1"> 是
                        </label>
                </div>
         </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">创建</button>
            </div>
          </div>
        </form>