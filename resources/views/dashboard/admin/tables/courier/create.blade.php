<html lang="en" class="h-100"><head>
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
    <body class="clickup-chrome-ext_installed h-100">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.sidebar')
        <div class="main-content h-100">
            @include('layouts.navbars.navbar',['page_name'=>'Courier',
                        'main_link'=>'table.courier.index'])
            <div class="header bg-biru pb-8 pt-5 pt-md-7 h-100">
                <div class="container-fluid">
                    <div class="header-body">
                        <form action="{{route('admin.table.courier.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-4">
                                    <div class="container rounded bg-light p-3">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h1>Courier Form</h1>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="name" class="form-label">Name</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('courier')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('courier') is-invalid @enderror" id="name" name="courier">
                                        </div>
                                        
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a role="button" href="{{route('admin.table.courier.index')}}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
{{-- 
            <div class="container-fluid mt--1 bg-biru ">
                @include('layouts.footers.footer')
            </div> --}}
        </div>
    </body>
</html>
