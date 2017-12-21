@extends('layouts.app')
@section('content')
<h2>学校列表</h2>
<table class="table table-hover">
    <thead>
    <tr><th>ID</th><th>名称</th><th>简称</th><th>英文名</th><th>学校代码</th><th>地址</th></tr>
    </thead>
    <tbody>
    @foreach ($schooles as $schoole)
    <tr>
        <td>{{$schoole->id}}</td>
        <td>{{$schoole->schoole_name}}</td>
        <td>{{$schoole->schoole_simple_name}}</td>
        <td>{{$schoole->schoole_en_name}}</td>
        <td>{{$schoole->schoole_code}}</td>
        <td>{{$schoole->schoole_address}}</td>
        <td><button class="btn">更新</button></td>
        <td><button class="btn">删除</button></td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$schooles->links()}}
@endsection