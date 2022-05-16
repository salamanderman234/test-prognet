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
                        'subs'=>[['detail',$product->id]]])
            <div class="header bg-biru pb-8 pt-5 pt-md-7">
                <div class="container-fluid">
                    <div class="header-body">
                        <form action="//" method="POST" enctype="multipart/form-data">
                            
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
                                            <input value="{{$product->weight}}" type="text" class="form-control" id="weight" name="weight" readonly>
                                        </div>
                                        <div class="container p-0 mb-3">
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
                                            <textarea value class="form-control" name="description" id="description" style="height: 48.7%; width:100%;" readonly>{{$product->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container rounded bg-light p-3">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h1>Detail</h1>
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
                                            <input value="{{$product->product_name}}" type="text" class="form-control" id="name" name="product_name" readonly>
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
                                            <input value="{{$product->price}}" type="text" class="form-control" id="price" name="price" readonly>
                                        </div>
                                        <div class="mb-5">
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
                                            <input value="{{$product->stock}}" type="text" class="form-control" id="stock" name="stock" readonly>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a role="button" href="{{route('admin.table.product.index')}}" class="btn btn-danger">Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="min-height: 460px; max-height: 428px;" class="container rounded bg-light p-3 image-section" style="max-height: 428px;">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Thumbnail</h2>
                                        </div>
                                        <div class="mb-1 w-100 d-flex justify-content-center">
                                            @if (count($product_images)>=1)
                                                <img src="{{ asset("storage/".$product_images[0]->image_name) }}" class="img-thumbnail w-50" alt="...">      
                                            @else
                                                <img src="{{ asset('images/gallery-image-2.jpg')}}" class="img-thumbnail w-50" alt="...">   
                                            @endif
                                        </div>
                                        <hr class="mt-4 ">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Product Images</h2>
                                        </div>
                                        @forelse ($product_images as $product_image)
                                            @if ($loop->index > 0)
                                                <div class="mb-2 w-100 d-flex justify-content-center">
                                                    <img src="{{ asset("storage/".$product_image->image_name) }}" class="img-thumbnail w-50" alt="...">
                                                </div>
                                            @endif
                                        @empty
                                            <div class="mb-2 w-100 d-flex justify-content-center">
                                                <span>Tidak ada gambar yang dapat ditampilkan</span>
                                            </div>
                                        @endforelse
                                        <hr class="mt-1 ">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Category</h2>
                                        </div>
                                        <div class="mb-1 w-100 d-flex justify-content-center align-items-center">
                                           @forelse ($product_categories as $product_category)
                                                <span class="bg-dark p-2 rounded text-white">
                                                    <i class="ni ni-tag me-3"></i> {{ $product_category->category_name }}
                                                </span>
                                           @empty
                                               <span>Tidak ada category</span>
                                           @endforelse
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
