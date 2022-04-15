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
        .h-60 {
            height: 60% !important;
        }
        .atas {
            height: 86.5% !important;
        }
        .btn-success {
            background-color: #3FC373;
            border-color: #3FC373;
        }

    </style>
    </head>
    <body class="clickup-chrome-ext_installed">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.sidebar')
        <div class="main-content">
            @include('layouts.navbars.navbar',['page_name'=>'Products',
                        'main_link'=>'table.product.index',
                        'subs'=>[]])
            <div class="header bg-biru pb-8 pt-5 pt-md-7 atas">
                <div class="container-fluid">
                    <div class="container mb-2 p-0 d-flex justify-content-end">
                        <a href="{{route('admin.table.product.create')}}"
                          role="button"
                          class="btn btn-success btn-round d-flex align-items-center justify-content-center">
                            <i class="ni ni-fat-add" style="font-size: 1.5em"></i> Add
                        </a>
                    </div>
                    <div class="header-body">
                        <table class="table bg-light rounded">
                            <thead class="thead-dark border-0">
                              <tr class="rounded">
                                <th scope="col">Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{$product->id}}</th>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$product->product_rate}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">No Products Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt--4 bg-biru ">
                @include('layouts.footers.footer')
            </div>
        </div>
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
