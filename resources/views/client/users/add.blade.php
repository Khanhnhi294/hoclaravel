@extends('layouts.client');
@section('title')
{{$title}}
@endsection

@section('content')

@if(section('msg'))
<div class="alert alert-success">{{section('msg')}}</div>
@endif

@if($errors ->any())
<div class="alert alert-success">Dữ liệu không hợp lệ</div>
@endif

<h1>{{$title}} </h1>
<a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
<hr/>
<form action="" method="post">

    <div class="mb-3">
        <label for="">Họ và tên</label>
        <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="{{old('fullname')}}">
        @error('fullname')
            <span  style= "color:red;" >{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
            <span  style= "color:red;" >{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
</form>

@endsection