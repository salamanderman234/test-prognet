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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            background-size: contain;
            background-position: center;
            height: 400px;
            width: 100%;
        }
        .bg-grey {
            background-color: #F3F4F5;
        }
        .cart:hover{
            background-color:  #b2841a !important;
        }
        .image-preview {
            object-fit: contain;
            width: 100%;
            max-height: 200px;
            
        }
    </style>
</head>
<body>

    <form id="purchase_form" action="{{ route('user.purchase',["products"=>$product->id]) }}" method="post">
        @csrf
        <input type="text" name="qty_purchase" id="qty_purchase" value="1" hidden>
        <input type="text" name="total" id="total" value="{{ $product_discount ? $product->price - ($product_discount->percentage/100*$product->price) : $product->price }}" hidden>
    </form>
    @include('layouts.navbars.user_navbar')
    <div class="content-section mt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center">
                    <a class="pb-1" href="/">Home</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                    
                    <a class="pb-1 ms-2" href="{{ route('search',['keyword'=>$category->category_name]) }}">{{ $category->category_name }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                    <span class="pb-1 text-secondary ms-2">{{ $product->product_name }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    
                    <div class="product-image width-auto border border-primary rounded" style="background-image: url('{{ asset('storage/'.$product_images->last()->image_name)  }}')">
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
                        <div class="container p-0 w-100">
                            <div class="row p-0">
                                <div class="col-2">
                                    <span class="text-primary fw-bold">Stock </span>
                                </div>
                                :
                                <div class="col-9">
                                    <span> {{ $product->stock }}</span>
                                </div>
                            </div>
                            
                            <div class="row p-0 mt-2">
                                <div class="col-2">
                                    <span class="text-primary fw-bold">Weight </span>
                                </div>
                                :
                                <div class="col-9">
                                    <span> {{ $product->weight }} gram</span>
                                </div>
                            </div>
                        </div>
                        <p class="product-infos">
                            <span>Price: Rp. 
                                @if ($product_discount)
                                    <s class="me-1">
                                        {{ number_format($product->price) }}                                    
                                    </s>
                                    {{ number_format($product->price - ($product_discount->percentage*$product->price/100)) }}                                    
                                @else
                                    {{ number_format($product->price) }}                                    
                                @endif
                            </span>
                            <span>Discount: {{ $product_discount ? $product_discount->percentage:'0' }}%</span>
                        </p>
                        <form id="add-cart" action="{{ route('user.cart.add',$product) }}" method="POST">    
                            @csrf
                            <ul class="product-buttons">
                                <li>
                                    <span>Quantity :</span>
                                    <input style="width: 34%" type="number" name="qty" value="1" id="qty-form">
                                </li>
                                <li class="d-inline">
                                    <a role="button" id="buy-button" class="main-btn buy">Buy Now</a>
                                </li>
                                <li class="d-inline">
                                    <a href="#" class="main-btn cart" style="background-color: goldenrod" onclick="document.getElementById('add-cart').submit();">Add to Cart</a>
                                </li>
                                
                            </ul>
                        </form>
                    </div> <!-- /.product-information -->
                </div> <!-- /.col-md-8 -->
                <div class="col-md-4 col-sm-8">
                    <h5 class="fw-bold mb-5 text-center">Preview Product</h5>
                        @if (count($product_images)>1)
                            @foreach ($product_images as $product_image)
                                @if ($loop->index < count($product_images)-1)
                                    <div class="product-item-2">
                                        <div class="product-thumb">
                                            <img class="image-preview" src="{{ asset('storage/'.$product_image->image_name)  }}" alt="Product Image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="product-item-2 text-center">
                                <div class="product-thumb">
                                    <span>Tidak ada perview product !</span>
                                </div>
                            </div>
                        @endif
                            
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
                    <h2>Reviews ({{ count($product_reviews) }})</h2>
                </div> <!-- /.section -->
            </div>
            @forelse ($product_reviews as $product_review)
                <div class="row mb-4">
                    <div class="col-md-12 section-title">
                        <div class="container rounded shadow w-100 p-4">
                            <span class="mb-2">{{ $product_review->user }}</span>
                            <div class="container p-0 mb-2">
                                <span class="fa fa-star {{ $product_review->rate>=1 ? 'checked':'' }}"></span>
                                <span class="fa fa-star {{ $product_review->rate>=2 ? 'checked':'' }}"></span>
                                <span class="fa fa-star {{ $product_review->rate>=3 ? 'checked':'' }}"></span>
                                <span class="fa fa-star {{ $product_review->rate>=4 ? 'checked':'' }}"></span>
                                <span class="fa fa-star {{ $product_review->rate>=5 ? 'checked':'' }}"></span>
                            </div>
                            <p>
                                {{ $product_review->content }}
                            </p>
                            @if ($product_review->responses)
                                @foreach ($product_review->responses as $response)
                                    <div class="rounded bg-grey ms-4 p-2">
                                        <span>Admin response :</span>
                                        <hr>
                                        <p>
                                            {{ $response->content }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div> <!-- /.section -->
                    
                </div>
            @empty
            <div class="row">
                <div class="col-md-12 section-title">
                    <span>Tidak ada Review !</span>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    
    @include('layouts.footers.user_footer')
</body>
<script>
    $(document).ready(function(){
        $("#buy-button").click(function(){
            console.log('asiap')
            $("#purchase_form").submit()
        })
        $("#qty-form").change(function(){
            var total = parseInt($(this).val()) * parseInt({{ $product_discount ? $product->price - ($product_discount->percentage/100*$product->price) : $product->price }})
            $("#qty_purchase").val($(this).val())
            $("#total").val(total)
            console.log($("#total").val())
            console.log($("#qty_purchase").val())
        })
    })
</script>