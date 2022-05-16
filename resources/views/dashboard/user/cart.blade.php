<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<!-- 
Kool Store Template
http://www.templatemo.com/preview/templatemo_428_kool_store
-->
    <meta charset="utf-8">
    <title>Kool Store - Responsive eCommerce Template</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content= "{{ csrf_token() }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-misc.css')}}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        .category {
            font-size: 0.8em;
            color: goldenrod !important;
        }
        .search:hover {
            background-color: #0056B3;
            color: white;
            border-color: #0056B3;;
        }
        .w-60 {
            width: 60% !important;
        }
        .dropdown-item {
            color: black !important;
        }
        .dropdown-item:hover {
            background-color: #2A80B9;
            color: white !important;
        }
        .dropdown-toggle::after {
            content: none;
        }
        .nav-item:hover {
            background-color: #0056B3;
        }
        .dropdown-toggle:focus{
            border: 0 !important;
            box-shadow: none;
        }
        .badge-notify {
            background-color: red;
            color: white;
            position:relative;
            top: -10px;
            left: -10px;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .badge-notify-cart {
            background-color: red;
            color: white;
            position:relative;
            top: -16px;
            left: -10px;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .checked {
            color: orange;
        }
        .product-image {
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            height: 400px;
            width: 100%;
        }
        .bg-grey {
            background-color: #F3F4F5;
        }
    </style>
</head>
<body>
    @include('layouts.navbars.user_navbar')
    <form id="purchaseForm" action="{{ route('user.purchase') }}" method="POST">
        @csrf
        <input type="text" id="total-harga" name="total" hidden>
        <input id="items" type="text" name="items" hidden>
    </form>
    <div class="mt-4 mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 d-flex align-items-center">
                    <h2>Cart</h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-8">
                    <div class="container p-0 product-section">
                        <div class="container p-0">
                            @forelse ($carts as $cart)
                                <div class="row shadow rounded mb-3 ">
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <input class="checkbox" type="checkbox" name="" id="item{{ $cart->id }}" value="{{ $cart->id }}">
                                    </div>
                                    <div class="col-2 py-2">
                                        <img src="{{ asset('storage/'.$cart->product_info->image->image_name) }}" class="img-thumbnail w-100" alt="...">
                                    </div>
                                    
                                    <div class="col-9 py-2">
                                        <span>{{ $cart->product_info->product_name }}</span>
                                        <span class="d-block mb-4">
                                        @if ($cart->product_info->final_price)
                                            Rp.
                                            <s class="me-1">{{ number_format($cart->product_info->price) }} </s>
                                            {{ number_format($cart->product_info->final_price) }}
                                        @else
                                            Rp. {{ number_format($cart->product_info->price) }}                                                
                                        @endif
                                        </span>
                                        <input value="{{ $cart->qty }}" type="number" class="form-control w-25 d-inline me-2">
                                        <form class="d-inline" action="{{ route('user.cart.delete',$cart->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>    
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <span>Tidak ada barang di keranjang</span>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container shadow p-3">
                        <span>Ringkasan Belanja</span>
                        <div class="container p-0 d-flex justify-content-between align-items-center my-3">
                            <span class="d-block " id="totalItem">Total Harga (0 barang)</span>
                            <span id="totalSementara">0</span>
                        </div>
                        <div class="container p-0 d-flex justify-content-between align-items-center my-3">
                            <span class="d-block ">Harga Discount</span>
                            <span id="totalDiscount">0</span>
                        </div>                         
                        <hr>
                        <div class="container p-0 d-flex justify-content-between align-items-center my-3">
                            <span class="d-block">Total Harga</span>
                            <span id="finalPrice">0</span>
                        </div>  
                        <div class="container d-flex justify-content-center align-items-center p-0">
                            <button class="btn btn-success w-100 rounded" id="purchase">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.user_footer')
    <script>
        $(document).ready(function (){
            var items_checked = []
            var csrf = $('meta[name="csrf-token"]').attr('content')
            var totalItem = $('#totalItem')
            var totalSementara = $('#totalSementara')
            var totalDiscount = $('#totalDiscount')
            var finalPrice = $('#finalPrice')
            var purchaseButton = $("#purchase")
            var purchaseForm = $('#purchaseForm')
            var total_harga = $('#total-harga')
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': csrf }
            });
            $(".checkbox").change(function() {
                if(this.checked) {
                    items_checked.push($(this).val())
                    request = $.ajax({
                        url: "{{ route('user.cart.product.harga') }}",
                        type: "post",
                        data: { 'item': $(this).val()} 
                    });

                    // Callback handler that will be called on success
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        var price_info = JSON.parse(response)
                        var totalPriceTemp = parseInt(totalSementara.text().replace(/,/g,'')) + parseInt(price_info['price'])
                        var totalDiscountTemp = parseInt(totalDiscount.text().replace(/,/g,'')) + parseInt(price_info['discount_price'])
                        var totalFinal = parseInt(finalPrice.text().replace(/,/g,'')) + parseInt(price_info['final_price'])
                        totalSementara.text(totalPriceTemp.toLocaleString('en-US'))
                        totalDiscount.text(totalDiscountTemp.toLocaleString('en-US'))
                        finalPrice.text(totalFinal.toLocaleString('en-US'))
                        total_harga.val(totalFinal)
                    });
                    
                }else {
                    items_checked.splice(items_checked.indexOf($(this).val()),1)
                    request = $.ajax({
                        url: "{{ route('user.cart.product.harga') }}",
                        type: "post",
                        data: { 'item': $(this).val()} 
                    });
                    // Callback handler that will be called on success
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        var price_info = JSON.parse(response)
                        var totalPriceTemp = parseInt(totalSementara.text().replace(/,/g,'')) - parseInt(price_info['price'])
                        var totalFinal = parseInt(finalPrice.text().replace(/,/g,'')) - parseInt(price_info['final_price'])
                        var totalDiscountTemp = parseInt(totalDiscount.text().replace(/,/g,'')) - parseInt(price_info['discount_price'])
                        totalSementara.text(totalPriceTemp.toLocaleString('en-US'))
                        totalDiscount.text(totalDiscountTemp.toLocaleString('en-US'))
                        finalPrice.text(totalFinal.toLocaleString('en-US'))
                        total_harga.val(totalFinal)

                    });
                }
                totalItem.text('Total Harga ('+items_checked.length +' barang)')
            })

            purchaseButton.click(function(){
                $("#items").val(items_checked)
                if(items_checked.length>0){
                    purchaseForm.submit()
                }
            })
        })
    </script>
</body>