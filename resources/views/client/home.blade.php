@extends('layouts.client');
@section('title')
{{$title}}
@endsection

            <!-- <x-alert type="danger"/> -->
            <x-alert type="danger" content="dat hang thanh cong"/>    
        @push('script')
            <script>
                console.log('push lan 2')
            </script>
        @endpush
        
@section('sidebar')
{{-- @parent  --}}
<h3>Home Sidebar</h3>
@endsection

@section('content')
<h1>TRang chu</h1>
<p><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Golden_tabby_and_white_kitten_n01.jpg/1200px-Golden_tabby_and_white_kitten_n01.jpg" alt=""></p>
<p><a href="{{ route('downLoadimage').'?image=https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Golden_tabby_and_white_kitten_n01.jpg/1200px-Golden_tabby_and_white_kitten_n01.jpg'}}" class="btn btn-success">Down loasd anh</a></p>
<p><a href="{{ route('downLoadimage').'?image='.public_path('storage/image_65e9aa10d925b.jpg')}}" class="btn btn-success">Down loasd anh</a></p>
@endsection

@section('css')
<style>
    header {
        background: blue;
        color: #fff;
    }
</style>
@endsection
@section('js')
document.querySelector('.show').onclick = function(){
alert('Thành công');
}
@endsection