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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        .category {
            font-size: 0.8em;
            color: goldenrod !important;
        }
        .product-thumbnail {
            max-width: 261px;
            max-height: 379.633px;
        }
    </style>
</head>
<body>

    @include('layouts.navbars.user_navbar')    
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>New Products</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                @forelse ($new_products as $new_product)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-item">
                            <div class="product-thumb">
                                @if ($new_product->thumbnail)
                                    <img class="product-thumbnail" src="{{ asset("storage/".$new_product->thumbnail->image_name) }}" alt="">
                                @else
                                    <img src="images/gallery-image-2.jpg" alt="">
                                @endif
                            </div> <!-- /.product-thum -->
                            <div class="product-content">
                                <h5><a href="{{ route('home.product_detail',['category'=>$new_product->categories->first(),'product'=>$new_product]) }}">{{ $new_product->product_name }}</a></h5>
                                @foreach ($new_product->categories as $category)
                                    {{ $loop->index>0 ? ",":'' }}
                                    <a href="{{ route('search',['keyword'=>$category->category_name]) }}" class="category">{{ $category->category_name }}</a>
                                @endforeach
                                {{-- <a href="{{ route('search',['keyword'=>$new_product->category->category_name]) }}" class="category">{{ $new_product->category->category_name }}</a> --}}
                                <span class="price">Rp.{{ number_format($new_product->price) }}</span>
                            </div> <!-- /.product-content -->
                        </div> <!-- /.producyyt-item -->
                    </div> <!-- /.col-md-3 -->
                @empty
                    <div class="col-md-3 col-sm-6">
                        <span>Tidak ada produk yang dapat ditampilkan</span>    
                    </div> <!-- /.col-md-3 -->
                @endforelse
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>Our Products</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                @forelse ($another_products as $another_product)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-item">
                            <div class="product-thumb">
                                @if ($another_product->thumbnail)
                                    <img src="{{ asset("storage/".$another_product->thumbnail->image_name) }}" alt="">
                                @else
                                    <img src="images/gallery-image-2.jpg" alt="">
                                @endif
                            </div> <!-- /.product-thum -->
                           <div class="product-content">
                                <h5><a href="{{ route('home.product_detail',['category'=>$another_product->categories->first(),'product'=>$another_product]) }}">{{ $another_product->product_name }}</a></h5>
                                @foreach ($another_product->categories as $category)
                                    {{ $loop->index>0 ? ",":'' }}
                                    <a href="{{ route('search',['keyword'=>$category->category_name]) }}" class="category">{{ $category->category_name }}</a>
                                @endforeach
                                <span class="price">Rp.{{ number_format($another_product->price) }}</span>
                            </div> <!-- /.product-content -->
                        </div> <!-- /.producyyt-item -->
                    </div> <!-- /.col-md-3 -->
                @empty
                    <div class="col-md-3 col-sm-6">
                        <span>Tidak ada produk yang dapat ditampilkan</span>    
                    </div> <!-- /.col-md-3 -->
                @endforelse
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

    <footer class="site-footer">
        <div class="our-partner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="customNavigation">
                            <a class="btn prev"><i class="fa fa-angle-left"></i></a>
                            <a class="btn next"><i class="fa fa-angle-right"></i></a>
                        </div>
                        <div id="owl-demo" class="owl-carousel">
                            <div class="item"> 
                            	<a href="#"><img src="images/tm-170x80-1.jpg" alt=""></a>
                          	</div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-2.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-1.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-2.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-1.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-2.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-1.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-2.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-1.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="images/tm-170x80-2.jpg" alt=""></a>
                            </div>
                        </div> <!-- /#owl-demo -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.our-partner -->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">About Us</h3>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, debitis recusandae.
                            <ul class="follow-us">
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                            </ul> <!-- /.follow-us -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">Why Choose Us?</h3>
                            Kool Store is free responsive eCommerce template provided by templatemo website. You can use this layout for any website.
                            <br><br>Tempore cum mollitia eveniet laboriosam corporis voluptas earum voluptate. Lorem ipsum dolor sit amet.
                            <br><br>Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for all images.
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Our Shop</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">Our Newsletter</h3>
                            <div class="newsletter">
                                <form action="#" method="get">
                                    <p>Sign up for our regular updates to know when new products are released.</p>
                                    <input type="text" title="Email" name="email" placeholder="Your Email Here">
                                    <input type="submit" class="s-button" value="Submit" name="Submit">
                                </form>
                            </div> <!-- /.newsletter -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-footer -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Copyright &copy; 2084 <a href="#">Company Name</a> | Design: templatemo</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, expedita soluta mollitia accusamus ut architecto maiores cum fugiat. Pariatur ipsum officiis fuga deleniti alias quia nostrum veritatis enim doloremque eligendi?</p>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer> <!-- /.site-footer -->
</body>
</html>