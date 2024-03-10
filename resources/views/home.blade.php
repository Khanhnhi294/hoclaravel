<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>hoc lap trinh</title> -->
    <title>@yield('title') - unicode</title>
    <style type="text/css">
        h1 {
            background-color: blueviolet;
            color: aliceblue;
        }
    </style>
</head>

<body>
    <!-- <header>
        <h1>header</h1>
        <h2>
            <?php echo $title; ?>
        </h2>
        <h3>{{ !empty(request()->keyword)?request()->keyword:'Không có gì' }}</h3>
    </header>
    <main>
        <h1>main</h1>
    </main>
    <footer>
        <h1>footer</h1>
    </footer>
    <hr> -->

    @extends('layouts.client')

    @section('title')
    <h1>TRang chu</h1>
    @env('local')
    <p>Moi truowng dev</p>
    @else
    <p>khong phai moi truowng dev</p>
    @endenv
    <!-- <x-alert type="danger"/> -->
    <x-alert type="danger" content="dat hang thanh cong" />
    <!-- <x-package-alert/>
        <x-inputs.button/>
        <x-forms-button/> -->
    @push('script')
    <script>
        console.log('push lan 2')
    </script>
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
    <div class="alert alert-{{section('type')}}">
    {{section('msg')}}
    </div>
        
    @endif
    <h1>TRang chu</h1>
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