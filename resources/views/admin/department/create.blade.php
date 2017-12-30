<form class="form-horizontal" method="POST" action="{{action('DepartmentController@store')}}" role="form">
{{ csrf_field() }}
<div class="form-group">
        <label for="schoole_en_name" class="col-sm-2 control-label">上级</label>
        <div class="col-sm-10">
         <select name="department_parent_id" id="">
             <option value="0">无</option>
             @if(isset($departmentAll))
             @foreach($departmentAll as $department)
                <option value="{{$department->id}}">{{$department->department_name}}</option>
              @endforeach
            @endif
         </select>
        </div>
 </div>
  <div class="form-group">
    <label for="department_full_name" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="department_full_name" name="department_full_name" value="{{old('department_full_name')}}" placeholder="简称">
    </div>
    </div>
    <div class="form-group">
    <label for="department_name" class="col-sm-2 control-label">简称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="department_name" value="{{old('department_name')}}" placeholder="部门简称">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">创建</button>
    </div>
  </div>
</form>