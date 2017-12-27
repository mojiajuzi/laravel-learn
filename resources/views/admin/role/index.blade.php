@extends('layouts.app')

@section('content')
<h2>角色分组</h2>
<table class="table table-hover">
    <thead>
    <tr><th>ID</th><th>Name</th><th>角色名称</th><th>创建时间</th><th>调整时间</th></tr>
    </thead>
    <tbody>
    @foreach ($roles as $role)
    <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>{{$role->display_name}}</td>
        <td>{{$role->created_at}}</td>
        <td>{{$role->updated_at}}</td>
        <td><button class="btn">更新</button></td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$roles->links()}}
@endsection