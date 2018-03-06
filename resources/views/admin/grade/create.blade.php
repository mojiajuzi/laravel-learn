<form class="form-horizontal" method="POST" action="{{action('GradeController@store')}}" role="form">
    {{ csrf_field() }}
      <div class="form-group">
        <label for="grade_full_name" class="col-sm-2 control-label">名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="grade_full_name" name="grade_full_name" value="{{old('grade_full_name')}}" placeholder="名称">
        </div>
        </div>
        <div class="form-group">
        <label for="grade_name" class="col-sm-2 control-label">简称</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="grade_name" value="{{old('grade_name')}}" placeholder="年级简称">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="col-sm-5">
                <button type="button" class="btn btn-default col-sm-5" id="create-form-hide">取消</button>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">创建</button>
            </div>
        </div>
      </div>
    </form>