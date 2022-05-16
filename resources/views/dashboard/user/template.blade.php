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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        .actived {
            border-left: 5px solid #2A80B9 !important;
            padding-left: 11px;
            background-color: #8cc1e2;
        }
        .profile-image {
            width: 300px;
            height: 300px;
            background-repeat: no-repeat;
            background-size: cover; 
        }
        .list-group-item:hover {
            cursor: pointer;
            background-color: #8cc1e2;
        }
        .image-product-transaction {
            max-height: 100px;
            max-width: 100px;
        }
        a {
            color: black;
        }
        a:hover {
            color: black;
        }
        .button:hover {
            cursor: pointer;
        }
        .checked {
            color: orange;
        }
        .checked-permanent {
            color: orange;
        }
        .fa:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('layouts.navbars.user_navbar')
    <div class="content-section mt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-9">
                    <div class="container shadow">
                        @yield('content')
                    </div>
                </div>
                <div class="col-3">
                    <div class="container shadow p-4">
                        <ul class="list-group">
                            <li class="list-group-item rounded-0 border-0 {{ Request::is('profile') ? 'actived':'' }}">
                                <a href="{{ route('user.profile') }}">
                                    Profile
                                </a>
                            </li>
                            <li class="list-group-item rounded-0 border-0 {{ Request::is('transactions') ? 'actived':'' }}">
                                <a href="{{ route('user.transactions') }}">
                                    Trasaction
                                </a>
                            </li>
                            <li class="list-group-item rounded-0 border-0 {{ Request::is('reviews') ? 'actived':'' }}">
                                <a href="{{ route('user.reviews') }}">
                                    Review
                                </a>
                            </li>
                            <li class="list-group-item rounded-0 border-0 {{ Request::is('notifications') ? 'actived':'' }}">
                                <a href="{{ route("user.notifications") }}">
                                    Notification
                                </a>
                            </li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footers.user_footer')
</body>