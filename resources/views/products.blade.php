<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - unicode</title>
    <style type="text/css">
        h1 {
            background-color: blueviolet;
            color: aliceblue;
        }
    </style>
</head>

<body>
    @extends('layouts.client')

    @section('title')
    <h1>Sản phẩm</h1>
    @push('script')
    <script>
        console.log('push lan 2')
    </script>
    @endpush
    @endsection

    @section('sidebar')
    @parent
    <h3>home sidebar</h3>
    @endsection

    @section('content')
    @if(section('msg'))
    <div class="alert alert-anger text-center ">
    
        {{section('msg')}}
    </div>
    @endif
    <h1>Sản phẩm</h1>
    @endsection

    @section('js')
    @endsection
    @push('script')
    <script>
        console.log('push lan 1')
    </script>
    @endpush
</body>

</html>