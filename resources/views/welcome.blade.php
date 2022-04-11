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
    </style>
</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    
    <header class="site-header">
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <div class="logo">
                            <h1><a href="#">Kool Store</a></h1>
                        </div> <!-- /.logo -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-header -->
        <div class="main-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="list-menu">
                            <ul>
                                <li class="nav-item"><a href="index.html">Home</a></li>
                                <li class="nav-item"><a href="product-detail.html">Catalogs</a></li>
                                <li class="nav-item"><a href="product-detail.html">About</a></li>
                                <li class="nav-item"><a href="contact.html">Contact</a></li>
                            </ul>
                        </div> <!-- /.list-menu -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-4 col-sm-3 flex-nowrap p-0">
                        <form class="form-inline h-100">
                            <div class="container-fluid p-0 d-flex justify-content-end">
                                <input class="form-control rounded-0 border-white w-60" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light rounded-0 border-start-0 search" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg>
                                </button>
                            </div>
                        </form>
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-2 col-sm-2 flex-nowrap pt-2" style=" padding-left: 0px !important;">
                        <div class="container-fluid d-flex align-items-center justify-content-end h-100 p-0">
                            @if (auth()->check())
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                </a>
                                <span class="badge badge-notify-cart rounded-circle">3</span>
                                <div class="dropdown d-flex justify-content-center">
                                    <a href="" class="dropdown-toggle" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                        </svg>
                                    </a>
                                    <span class="badge badge-notify rounded-circle">3</span>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                                        <li><a class="dropdown-item" href="#">No Notification</a></li>
                                    </ul>   
                                </div>     
                                <a href="" class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <form action="{{route('user.logout')}}" method="post" class="dropdown-item" id="logout">
                                            @csrf
                                            <a class="dropdown-item p-0" href="javascript:{}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('user.login')}}">Login / Register</a>
                            @endif
                        </div>
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-nav -->
    </header> <!-- /.site-header -->
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>New Products</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-2.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="price">$40.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-3.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Sport Shirt</a></h5>
                            <span class="price">$40.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-4.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Elegant Shirt</a></h5>
                            <span class="price">$60.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-5.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Another New Shirt</a></h5>
                            <span class="price">$80.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>Best Seller</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-2.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="price">$40.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-3.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Sport Shirt</a></h5>
                            <span class="price">$40.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-4.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Elegant Shirt</a></h5>
                            <span class="price">$60.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="images/gallery-image-5.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Another New Shirt</a></h5>
                            <span class="price">$80.00</span>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
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