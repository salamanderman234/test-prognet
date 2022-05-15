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
            @include('layouts.navbars.navbar',['page_name'=>'Transactions',
                        'main_link'=>'transaction.index',
                        'subs'=>[]])
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
                    </div>
                    <div class="header-body">
                        <table class="table bg-light rounded">
                            <thead class="thead-dark border-0 text-center">
                              <tr class="rounded">
                                <th scope="col">Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Product</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">Action</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr class="text-center table-row" data-href='{{ route('admin.transaction.edit',$transaction) }}'>
                                        <th class="clickable-row" scope="row">{{$transaction->id}}</th>
                                        <td class="clickable-row">{{$transaction->username}}</td>
                                        <td class="clickable-row">{{$transaction->product}}</td>
                                        <td class="clickable-row">{{$transaction->status}}</td>
                                        {{-- <td>
                                            <a href="" role="button" type="button" rel="tooltip" class="btn btn-primary btn-icon btn-sm text-light rounded" data-original-title="" title="">
                                                Ubah Status
                                            </a role="button">
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">No Transaction Found</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>

                    </div>
                    <div class="d-flex justify-content-center" style="font-size: 1.1em">
                        {{$transactions->links()}}
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
                $(".clickable-row").click(function() {
                    window.location = $('.table-row').data("href");
                });
                $(".delete").click(function() {
                    $('.delete-form').submit()
                });
            });
        </script>
    </body>
</html>
