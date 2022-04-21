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
        .h-60 {
            height: 60% !important;
        }
        /* .atas {
            height: 86.5% !important;
        } */
        .btn-success {
            background-color: #3FC373;
            border-color: #3FC373;
        }
        tr:hover {
            background-color: #b9c5ce !important;
            cursor: pointer;
        }
        .page-link{
            color: black;
        }
        .half-capsule-start {
            border-start-start-radius: 500px;
            border-end-start-radius: 500px;
            border: none;
        }
        .half-capsule-end {
            border-start-end-radius: 500px;
            border-end-end-radius: 500px;
            border: none;
            background: white;
        }
        .half-capsule-end:hover {
            transform: translateY(0px) !important; 
        } 
        .search{
            padding-left: 30px; 
            color: black !important;
        }
    </style>
    </head>
    <body class="clickup-chrome-ext_installed h-100">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.sidebar')
        <div class="main-content h-100 bg-biru">
            @include('layouts.navbars.navbar',['page_name'=>'Courier',
                        'main_link'=>'table.courier.index'])
            <div class="header bg-biru pb-2 pt-5 pt-md-7 atas">
                <div class="container-fluid">
                    <div class="row p-0">
                        <div class="col-4">

                        </div>
                        <div class="col-4 py-0">
                            <form class="d-flex" >
                                <input  class="search form-control me-2 half-capsule-start float-end text-end text-white" type="search" aria-label="Search">
                                <button class=" btn half-capsule-end" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg>
                                </button>
                            </form>
                        </div>
                        <div class="col-4 py-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('admin.table.courier.create')}}"
                            role="button"
                            class="btn btn-success btn-round d-flex align-items-center justify-content-center">
                                <i class="ni ni-fat-add" style="font-size: 1.5em"></i> Add
                            </a>
                        </div>

                    </div>
                    <div class="header-body">
                        <table class="table bg-light rounded">
                            <thead class="thead-dark border-0 text-center">
                              <tr class="rounded">
                                <th scope="col">Id</th>
                                <th scope="col">courier Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($couriers as $courier)
                                    <tr class="text-center table-row">
                                        <th class="clickable-row" scope="row">{{$courier->id}}</th>
                                        <td class="clickable-row">{{$courier->courier}}</td>
                                        <td>
                                            <a href="{{route('admin.table.courier.edit',$courier)}}" role="button" type="button" rel="tooltip" class="btn btn-primary btn-icon btn-sm text-light" data-original-title="" title="">
                                              <i class="ni ni-settings p-1"></i>
                                            </a role="button">
                                            <a role="button" type="button" rel="tooltip" class="delete btn btn-danger btn-icon btn-sm text-light" data-original-title="" title="">
                                              <i class="ni ni-fat-remove p-1"></i>
                                            </a role="button">
                                            <form class="delete-form" action="{{route('admin.table.courier.destroy',$courier)}}" method="post" hidden>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">No Data Found</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>

                    </div>
                    <div class="d-flex justify-content-center" style="font-size: 1.1em">
                        {{$couriers->links()}}
                    </div>
                </div>
            </div>
            <div class="container-fluid mt--3 bg-biru ">
                @include('layouts.footers.footer')
            </div>
        </div>
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script>
            $(document).ready(function($) {
                $(".delete").click(function() {
                    $('.delete-form').submit()
                });
            });
        </script>
    </body>
</html>
