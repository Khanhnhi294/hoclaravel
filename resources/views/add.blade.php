@extends('layouts.client')

@section ('title')
{{$title}}
@endsection

@section('content')
<h1> Thêm sản phẩm </h1>
<form action="" method="post" style="justify-content: space-between; align-items:center;">
    @if($errors->any())
    <!-- @php
    dd($errors->all());
    @endphp -->

    <div class="alert alert-anger text-center ">
        {{-- @foreach ($errors-> all() as $error)
        <p>{{$$error}}</p>
        @endforeach --}}
        {{$errorMessage}}
    </div>
    @endif

    <div class="mb-3">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm" value="{{old(product_name)}}">
        @error('product_name')
        <span style="color: red">{{$message}} </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="">Giá sản phẩm</label>
        <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm" value="{{old(product_price)}}">
        @error('product_price')
        <span style="color: red">{{$message}} </span>
        @enderror
    </div>q

@section('css')
@endsection
@section('js')
@endsection
