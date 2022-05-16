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
                            <li class="nav-item"><a href="/">Home</a></li>
                            <li class="nav-item"><a href="{{ route('user.catalog') }}">Catalogs</a></li>
                        </ul>
                    </div> <!-- /.list-menu -->
                </div> <!-- /.col-md-6 -->
                <div class="col-md-4 col-sm-3 flex-nowrap p-0">
                    <form action="{{ route('search') }}" class="form-inline h-100 d-flex align-items-center">
                        <div class="container-fluid p-0 d-flex justify-content-end">
                            <input name="keyword" class="form-control rounded-0 border-white w-60" type="search" placeholder="Masukan Nama Produk" aria-label="Search" required>
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
                            <a href="{{ route('user.cart.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill {{ count(auth()->user()->carts()->where('status','Belum Checkout')->get())==0 ? 'me-3' :'' }}" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </a>
                            @if (count(auth()->user()->carts()->where('status','Belum Checkout')->get())>0)
                                <span class="badge badge-notify-cart rounded-circle">{{count(auth()->user()->carts()->where('status','Belum Checkout')->get())}}</span>
                            @endif
                            <div class="dropdown d-flex justify-content-center " id="notification-icon">
                                <a href="{{ route('user.notifications') }}" id="notification-icon" class="dropdown-toggle " id="navbarDropdown2" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill {{ count(auth()->user()->unreadNotifications)==0 ?'me-3':'' }}" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                    </svg>
                                </a>
                                @if (count(auth()->user()->unreadNotifications)>0)
                                    <span class="badge badge-notify rounded-circle">{{ count(auth()->user()->unreadNotifications) }}</span>
                                @endif
                                {{-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                                    <li><a class="dropdown-item" href="#">No Notification</a></li>
                                </ul>    --}}
                            </div>     
                            <a href="" class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.transactions') }}">Transactions</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.reviews') }}">Reviews</a></li>
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
<script>
    $(document).ready(function(){
        var csrf = "{{ csrf_token() }}"
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': csrf }
        });
        $("#notification-icon").click(function(){
            request = $.ajax({
                url: "{{ route('user.notification.read') }}",
                type: "post",
            });
        })
    })
</script>