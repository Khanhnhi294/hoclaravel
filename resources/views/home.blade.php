<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoc lap trinh</title>
</head>

<body>
    <!-- <header>
        <h1>header</h1>
        <h2>
            <?php echo $title; ?>
        </h2>
    </header>
    <main>
        <h1>main</h1>
    </main>
    <footer>
        <h1>footer</h1>
    </footer> -->
    <h1>Trang chủ Unicode</h1>
    <h2>{{ !empty(request()->keyword)?request()->keyword:'Không có gì' }}</h2>
    <div class="container">
        {!! !empty($content)?$content:false !!}
    </div>

    <hr>

    @for ($i = 1; $i<=10;$i++) @if ($i==5) @continue @endif <p>Phần tử thứ: {{$i}}</p>
        @endfor

        @php
        // $message ='Đặt hàng thành công';
        @endphp
        @include('parts.notice');


</body>

</html>