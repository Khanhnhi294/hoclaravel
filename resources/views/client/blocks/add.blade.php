<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - unicode</title>
    <style type="text/css" >
        h1{
            background-color: blueviolet;
            color: aliceblue;
        }
    </style>
</head>
<body>
    @extends('layouts.client')

    @section('title')
        <h1> them san pham </h1>
    @endsection

    @section('sidebar')
        @parent 
        <h3>home sidebar</h3>
    @endsection

    @section('content')
    <h1>TRang add sp</h1>
    <form action="" method="post" >
        <input type="text" name="name">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit">
    </form>
    @endsection
</body>
</html>