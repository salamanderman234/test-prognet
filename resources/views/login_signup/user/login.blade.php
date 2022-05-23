<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .bg-image {
            background-repeat: no-repeat;
            background-size: cover;
        }
        input {
            border-color: black !important;
        }
        .tambahan {
            font-size: 13px;
        }
        .button {
            background-color: #2A80B9;
            color: white;
        }
        .button:hover {
            background-color: #0056B3;
            color: white;
        }
        .error-message {
            font-size: 13px;
            color: red;
        }
        .is-invalid {
            border-color:red !important; 
        }
        .invalid-message {
            font-size: 0.7em;
        }
    </style>
    <title>Document</title>
</head>
<body class="h-100 d-flex align-items-center justify-content-center">
    <div class="container border border-dark w-75 rounded">
        <div class="row">
            <div class="col-6 bg-image" style="background-image: url('{{asset('images/gallery-image-2.jpg')}}');">
            </div>
            <div class="col-6">
                <div class="container w-75 p-5" style="font-size: 15px;">
                    <h1 class="mb-5">Login</h1>
                    <form action="{{ route('user.autenticate') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-9 d-flex justify-content-end align-items-center">
                                    @if($errors->hasAny('message'))
                                        <div class="container-fluid d-flex justify-content-end p-0 m-0">
                                            <span class="error-message">{{$errors->get('message')[0]}}</span>
                                        </div>
                                    @endif
                                    @error('email')
                                        <div class="text-danger invalid-message">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                          <input type="email" class="form-control @error('email') is-invalid @enderror @if($errors->any()){{'is-invalid'}}@endif" id="email" aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="col-9 d-flex justify-content-end align-items-center">
                                    @error('password')
                                        <div class="text-danger invalid-message">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                          <input type="password" class="form-control @error('password') is-invalid @enderror @if($errors->any()){{'is-invalid'}}@endif" id="password" name="password">
                        </div>
                        <div class="mb-3 form-check">
                            <div class="row">
                                <div class="col-6">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label tambahan" for="remember">Remember Me</label>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a href="{{ route('password.request') }}" class="tambahan">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn button w-100 mb-2">Login</button>
                        <div class="container text-center">
                            <a href="{{ route('user.signup')}}" class="tambahan text-center">Not a Member Yet ?</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>