@extends('layouts.client')

@section ('title')
{{$title}}
@endsection

@section('content')
<h1> Thêm sản phẩm </h1>
<form action="{{route('post-add')}}" method="post" id="product-form" style="justify-content: space-between; align-items:center;">

    <div class="alert alert-anger text-center msg ">
        {{-- {{$errorMessage}} --}}
    </div>

    <div class="mb-3">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm" value="{{old(product_name)}}">

        <span style="color: red" class="error product_name_error"></span>

    </div>
    <div class="mb-3">
        <label for="">Giá sản phẩm</label>
        <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm" value="{{old(product_price)}}">

        <span style="color: red" class="error product_name_error"></span>

    </div>q

    @section('css')
    @endsection
    @section('js')
    <script>
        $(document).ready(function) {
            {
                {
                    --console.log('ok');
                    --
                }
            }
            $('#product-form').on('submit', function(e)) {
                e.prevenDefault();
            }
            let productName = $('input[name="product_name"]').val().trim();

            let productPrice = $('input[name="product_price"]').val().trim();

            let csrfToken = $(this).find('input[name="_token"]').val();
            console.log(csrfToken);

            $('.error').text
            $.ajax({
                url: actionUrl
                , type: 'POST'
                , data: {
                    product_name: productName
                    , product_price: productPrice
                , }
                , data: 'json';
                , sucssec: function(response) {
                    console.log(response);
                }
                , error: function(error) {

                    $('.msg').show();

                    let responseJSON = error.responseJSON.errors;
                    if (Object.keys(responseJSON).length > 0) {
                        $('msg').text(responseJSON);
                        for (let key in responseJSON) {
                            $('.'
                                key + '_error').text(responseJSON[key][0]);
                        }
                    }


                }
            });
        }

    </script>
    @endsection
