@extends('layouts.client');
@section('title')
{{$title}}
@endsection

@section('content')
<h1>{{$title}} </h1>
<a href="#" class="btn btn-primary">Thêm người dùng</a>
<hr />
<table class="table table-bordered">
    <thead>
        <tr>
            <th width=5%>STT</th>
            <th> Tên</th>
            <th>Email</th>
            <th width=10%>Thời gian </th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            @if(!empty($listUser))
            @foreach($users as $key => $item)

            <td>{{$key+1}}</td>
            <td> {{$item->fullname}}</td>
            <td>{{$item->email}}</td>
            <td> {{$item->create_at}}</td>
            <td>
                <a href="{{route('users.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sửa</a>
            </td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">Xóa</a>
            </td>
            @endforeach
        </tr>
        @endif
        <tr>
            <td colspan=4> Không có người dùng</td>
            <td colspan=6> Không có người dùng</td>
        </tr>
    </tbody>
</table>

@endsection