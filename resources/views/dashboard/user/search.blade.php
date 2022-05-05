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

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-misc.css')}}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

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
    <div class="mt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center">
                    <a class="pb-1" href="/">Home</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                    
                    <span class="pb-1 text-secondary ms-2">{{ $slug }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex align-items-center">
                    <h2>Search for : "{{ $slug }}"</h2>
                </div>
            </div>
            <hr>
            <div class="row d-flex flex-wrap justify-content-center">
                @forelse ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-item">
                            <div class="product-thumb">
                                @if ($product->thumbnail)
                                    <img src="{{ asset("storage/".$product->thumbnail->image_name) }}" alt="">
                                @else
                                    <img src="images/gallery-image-2.jpg" alt="">
                                @endif
                            </div> <!-- /.product-thum -->
                            <div class="product-content">
                                <h5><a href="{{ route('home.product_detail',['category'=>$product->categories->first(),'product'=>$product]) }}">{{ $product->product_name }}</a></h5>
                                @foreach ($product->categories as $category)
                                    {{ $loop->index>0 ? ",":'' }}
                                    <a href="{{ route('search',['keyword'=>$category->category_name]) }}" class="category">{{ $category->category_name }}</a>
                                @endforeach
                                {{-- <a href="{{ route('search',['category'=>$product->category->category_name]) }}" class="category">{{ $product->category->category_name }}</a> --}}
                                <span class="price">Rp. {{ number_format($product->price) }}</span>
                            </div> <!-- /.product-content -->
                        </div> <!-- /.producyyt-item -->
                    </div>
                @empty
                    <div class="col-md-3 col-sm-6">
                        <div class="product-item">
                            <span>Tidak ada produk yang ditemukan</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>