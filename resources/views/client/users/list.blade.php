@extends('layouts.client');
@section('title')
{{$title}}
@endsection

@section('content')
<h1>{{$title}} </h1>
<a href="#" class="btn btn-primary">Thêm người dùng</a>
<hr/>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width=5%>STT</th>
            <th> Tên</th>
            <th>Email</th>
            <th width=10%>Thời gian </th>
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
            @endforeach

            <td></td>
        </tr>
        @endif
        <tr>
            <td colspan=4> Không có người dùng</td>
        </tr>
    </tbody>
</table>

@endsection