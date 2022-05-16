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
            @include('layouts.navbars.navbar',['page_name'=>'Products',
                        'main_link'=>'table.product.index',
                        'subs'=>[['create',null]]])
            <div class="header bg-biru pb-8 pt-5 pt-md-7">
                <div class="container-fluid">
                    <div class="header-body">
                        <form action="{{route('admin.table.product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex ">
                                <div class="col-4">
                                    <div class="container rounded bg-light p-3">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Extra Information</h2>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="weight" class="form-label">Weight (g)</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('weight')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight">
                                        </div>
                                        <div class="container p-0">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="description" class="form-label">Description</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('description')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="height: 48.2%; width:100%;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container rounded bg-light p-3">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h1>Product Form</h1>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="name" class="form-label">Name</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('product_name')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="name" name="product_name">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="price" class="form-label">Price (Rp)</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('price')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row px-3">
                                                <div class="col-4 p-0">
                                                    <label for="stock" class="form-label">Stock</label>
                                                </div>
                                                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                                                    @error('stock')
                                                        <div class="text-danger" style="font-size: 0.7em">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a role="button" href="{{route('admin.table.product.index')}}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="min-height: 428px; max-height: 428px;" class="container rounded bg-light p-3 image-section" style="max-height: 428px;">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Product Images</h2>
                                        </div>
                                        <div class="mb-2 ">
                                            <div class="row p-3">
                                                <input name="product_image" type="file" class="form-control" accept="image/png, image/jpeg, image/webp">
                                            </div>
                                            {{-- <div class="row p-0 d-flex justify-content-center ">
                                                <img src="{{ asset('images/gallery-image-2.jpg')}}" class="img-thumbnail w-50" alt="...">
                                            </div> --}}
                                        </div>
                                    
                                        <hr class="mt-1 ">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Category</h2>
                                        </div>
                                        <div class="mb-1 w-100 d-flex justify-content-center align-items-center">
                                           <select name="product_category" class="form-control @error('product_category') is-invalid @enderror">
                                               @forelse ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>                   
                                               @empty
                                                    <option value="">Tidak ada category</option>                   

                                               @endforelse
                                           </select>

                                        </div>
                                        @error('product_category')
                                            <div class="text-danger" style="font-size: 0.7em">
                                                {{$message}}
                                            </div>
                                        @enderror
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
