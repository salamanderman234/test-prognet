<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
        .category-label:hover{
            cursor: pointer;

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
                        'subs'=>[['edit',$product->id]]])
            <div class="header bg-biru pb-8 pt-5 pt-md-7">
                <div class="container-fluid">
                    <div class="header-body">
                        <form action="{{route('admin.table.product.update',$product)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                            <input value="{{$product->weight}}" type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight">
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
                                            <textarea value class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="height: 48.7%; width:100%;">{{$product->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container rounded bg-light p-3">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h1>Edit Product</h1>
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
                                            <input value="{{$product->product_name}}" type="text" class="form-control @error('product_name') is-invalid @enderror" id="name" name="product_name">
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
                                            <input value="{{$product->price}}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
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
                                            <input value="{{$product->stock}}" type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a role="button" href="{{route('admin.table.product.index')}}" class="btn btn-danger">Cancel</a>
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
                                        <input class="form-control mt-3" type="file" name="thumbnail">
                        {{-- penting ajg jangan dihapus form ini ! --}}
                        </form>
                                        <hr class="mt-4 ">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <h2>Product Images</h2>
                                        </div>
                                        @for ($i=0; $i<4 ; $i++)
                                            @if ($i > 0 && array_key_exists($i, $product_images->toArray()))
                                                <div class="mb-2 w-100 d-flex justify-content-center">
                                                    <img src="{{ asset("storage/".$product_images[$i]->image_name) }}" class="img-thumbnail w-50 mb-3" alt="...">
                                                </div>
                                                <div class="container w-100 p-0 d-flex justify-content-center">
                                                    <form class="w-100 p-0" action="{{ route('admin.product_image.delete',$product_images[$i]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100">Hapus</button>
                                                    </form>
                                                </div>
                                            @elseif($i>0)
                                                <div class="mb-2 w-100 d-flex justify-content-center">
                                                    <img src="{{ asset('images/gallery-image-2.jpg')}}" class="img-thumbnail w-50 mb-3" alt="...">        
                                                </div>
                                            @endif
                                            @if ($i>0)                                                   
                                                <a role="button" class="btn btn-success w-100 text-white mb-4" data-bs-toggle="modal" data-bs-target="#modal{{ $i }}">Upload</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{ $i }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-center" id="exampleModalLabel">Upload Image</h3>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (array_key_exists($i, $product_images->toArray()))
                                                                <form id="imageForm{{ $i }}" action="{{ route('admin.product_image.upload',['product_id'=>$product->id,'image_id'=>$product_images[$i]->id]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label for="">Image File</label>
                                                                    <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/webp" required>
                                                                </form>
                                                            @else
                                                                <form id="imageForm{{ $i }}" action="{{ route('admin.product_image.upload',['product_id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label for="">Image File</label>
                                                                    <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/webp" required>
                                                                </form>
                                                            @endif
                                                            
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('imageForm{{ $i }}').submit();">Upload</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-1 ">
                                            @endif
                                        @endfor
                                        <div class="mb-3 d-flex justify-content-center">
                                            <h2>Category</h2>
                                        </div>
                                        <div class="mb-1 w-100 d-flex justify-content-center align-items-center">
                                            @foreach ($product_categories as $product_category)
                                                <span class="bg-dark text-white p-2 rounded me-2 category-label" data-bs-toggle="modal" data-bs-target="#modalCategory{{ $product_category->id }}">
                                                    <i class="ni ni-tag me-1"></i> {{ $product_category->category_name }}
                                                </span>
                                                <div class="modal fade" id="modalCategory{{ $product_category->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-center" id="exampleModalLabel">Change Category ( {{ $product_category->category_name }} )</h3>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="categoryForm{{ $product_category->id }}" action="{{ route('admin.product_category.change',['product_id'=>$product->id,'product_category_id'=>$product_category->id]) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <label for="">Category </label>
                                                                <select name="category" id="" class="form-control">
                                                                    @foreach ($categories as $category)
                                                                        <option {{ $product_category->id == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('categoryForm{{ $product_category->id }}').submit();">Change</button>
                                                            <form action="{{ route('admin.product_category.remove',['product_id'=>$product->id,'product_category_id'=>$product_category->id]) }}" method="POST">
                                                                @csrf   
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <span class="bg-success p-2 rounded text-white category-label" data-bs-toggle="modal" data-bs-target="#modalCategoryAdd">
                                                <i class="ni ni-fat-add m-1"></i>   
                                            </span>
                                            <div class="modal fade" id="modalCategoryAdd" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center" id="exampleModalLabel">Add Category</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="categoryFormAdd" action="{{ route('admin.product_category.add',['product_id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <label for="">Category </label>
                                                            <select name="category" id="" class="form-control">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('categoryFormAdd').submit();">Add</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
            <div class="container-fluid mt--1 bg-biru ">
                @include('layouts.footers.footer')
            </div>
        </div>
    </body>
</html>
