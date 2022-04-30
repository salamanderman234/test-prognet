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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <style>
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
            background-size: cover;
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    @include('layouts.navbars.user_navbar')
    <div class="content-section mt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center">
                    <a class="pb-1" href="/">Home</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="border border-primary product-image" style="background-image: url('{{ asset('storage/'.$product->images->first()->image_name)  }}')">
                        {{-- <img width="300px" height="300px" src="" alt=""> --}}
                    </div> <!-- /.product-image -->
                    <div class="product-information">
                        <h2 class="mb-2 font-weight-bold">{{ $product->product_name }}</h2>
                        <div class="container p-0 mb-3">
                            <span class="fa fa-star {{ $product->product_rate>=1 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $product->product_rate>=2 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $product->product_rate>=3 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $product->product_rate>=4 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $product->product_rate>=5 ? 'checked':'' }}"></span>
                            <span>{{ $product->product_rate }}</span>
                        </div>
                        <p class="text-justify">{{ $product->description }}</p>
                        <p class="product-infos">
                            <span>Price: Rp. {{ number_format($product->price) }}</span>
                            <span>Discount: 0%</span>
                        </p>
                        <ul class="product-buttons">
                            <li>
                                <span>Quantity :</span>
                                <input type="number" name="quantity">
                            </li>
                            <li class="d-inline">
                                <a href="#" class="main-btn">Buy Now</a>
                            </li>
                            <li class="d-inline">
                                <a href="#" class="main-btn btn-light border border-primary">Add to Cart</a>
                            </li>
                        </ul>
                    </div> <!-- /.product-information -->
                </div> <!-- /.col-md-8 -->
                <div class="col-md-4 col-sm-8">
                    <h5 class="font-weight-bold mb-4">Preview Product</h5>
                    @forelse ($product_images as $product_image)
                        @if ($loop->index > 0)
                            <div class="product-item-2">
                                <div class="product-thumb">
                                    <img src="{{ asset('storage/'.$product_image->image_name)  }}" alt="Product Image">
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="product-item-2">
                            <div class="product-thumb">
                                <span>Tidak ada perview product !</span>
                            </div>
                        </div>
                    @endforelse
                    {{-- <div class="product-item-2">
                        <div class="product-thumb">
                            <img src="images/featured/2.jpg" alt="Product Title">
                        </div> <!-- /.product-thumb -->
                        <div class="product-content overlay">
                            <h5><a href="#">Name Of Shirt</a></h5>
                            <span class="tagline">Partner Name</span>
                            <span class="price">$40.00</span>
                            <p>Doloremque quo possimus quas necessitatibus blanditiis excepturi. Commodi, sunt tenetur deleniti labore!</p>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-2 -->
                    <div class="product-item-2">
                        <div class="product-thumb">
                            <img src="images/featured/8.jpg" alt="Product Title">
                        </div> <!-- /.product-thumb -->
                        <div class="product-content overlay">
                            <h5><a href="#">Name Of Shirt</a></h5>
                            <span class="tagline">Partner Name</span>
                            <span class="price">$50.00</span>
                            <p>Doloremque quo possimus quas necessitatibus blanditiis excepturi. Commodi, sunt tenetur deleniti labore!</p>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-2 --> --}}
                </div> <!-- /.col-md-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>Vote For Future Products</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/1.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: Catherine</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>4<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">6<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/2.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: Rebecca</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>4<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">6<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/3.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: Catherine</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>4<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">6<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/4.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: Rebecca</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>4<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">6<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->
    @include('layouts.footers.user_footer')
</body>