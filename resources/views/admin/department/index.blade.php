@extends('layouts.app')
@section('content')
<h2>学校列表</h2>
<div class="panel panel-primary">
    <div class="panel-heading">部门列表</div>
      <div class="panel-body">
          <div class="row">
              <div class="col-md-6">
                  <h3>部门列表</h3>
                <ul id="tree1">
                    @foreach($parentDepartment as $parent)
                        <li>
                            {{ $parent->department_name }}
                            @if(count($parent->childs))
                                @include('manageChild',['childs' => $parent->childs])
                            @endif
                        </li>
                    @endforeach
                </ul>
              </div>
              <div class="col-md-6">
                  <h3>添加部门</h3>
              </div>
          </div>

          
      </div>
</div>
@endsection