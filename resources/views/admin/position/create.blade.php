<form class="form-horizontal" method="POST" action="{{action('PositionController@store')}}" role="form">
        {{ csrf_field() }}

        {{--  上级职位  --}}
        <div class="form-group">
                <label for="schoole_en_name" class="col-sm-2 control-label">上级</label>
                <div class="col-sm-10">
                 <select name="position_parent_id" id="">
                     <option value="0">无</option>
                     @if(isset($positionList))
                     @foreach($positionList as $position)
                        <option value="{{$position->id}}">{{$position->positiont_name}}</option>
                      @endforeach
                    @endif
                 </select>
                </div>
         </div>

         {{--  职位名称  --}}
          <div class="form-group">
            <label for="position_name" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="position_name" name="position_name" value="{{old('position_name')}}" placeholder="职位名称">
            </div>
            </div>
          {{--  职位人员  --}}
          <div class="form-group">
                <label for="schoole_en_name" class="col-sm-2 control-label">任职人员</label>
                <div class="col-sm-10">
                 <select name="position_parent_id" id="">
                     <option value="0">无</option>
                     @if(isset($positionList))
                     @foreach($positionList as $position)
                        <option value="{{$position->id}}">{{$position->positiont_name}}</option>
                      @endforeach
                    @endif
                 </select>
                </div>
         </div>
         {{--  是否为部门负责人  --}}
         <div class="form-group">
                <label for="schoole_en_name" class="col-sm-2 control-label">设置职位为部门负责人</label>
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