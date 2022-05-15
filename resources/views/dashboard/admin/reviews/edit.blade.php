<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
           <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-laravel" />
    <style>
        .bg-biru {
            background-color:#2A80B9; 
        }
        .footer .nav .nav-item .nav-link {
            color: white !important;
        }
        .btn-success {
            background-color: #3FC373;
            border-color: #3FC373;
        }
        .image-section{
            overflow: auto !important;
        }
    </style>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </head>
    <body class="clickup-chrome-ext_installed">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.sidebar')
        <div class="main-content">
            @include('layouts.navbars.navbar',['page_name'=>'Reviews',
                        'main_link'=>'review.index'])
            <div class="header bg-biru pb-8 pt-5 pt-md-7">
                <div class="container-fluid">
                    <div class="header-body">
                        <form action="{{route('admin.review.reply.edit.save',$review)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-4">
                                    <div class="container rounded bg-light p-3">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h1>Reply Review {{ $review->product->product_name }} oleh {{ $review->user->name }}</h1>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="name" class="form-label">Review</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('content')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" cols="30" rows="10">{{ $response->content }}</textarea>
                                            
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                            <a role="button" href="{{route('admin.review.index')}}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="container-fluid mt--1 bg-biru ">
                @include('layouts.footers.footer')
            </div>
        </div>
    </body>
</html>
