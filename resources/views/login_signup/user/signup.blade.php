<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <div class="col-6">
                <div class="container w-75 p-4" style="font-size: 15px;">
                    <h1 class="mb-4">Register</h1>
                    <form action="{{route('user.save_signup')}}" method="post">
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
                          <input value="{{ old('email') }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label for="name" class="form-label">Full Name</label>
                                </div>
                                <div class="col-8 d-flex justify-content-end align-items-center">
                                    @error('name')
                                        <div class="text-danger invalid-message">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp">
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
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                    <div class="col-6">
                                        <label for="confirm" class="form-label">Confirm Password</label>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end align-items-center">
                                        @error('password_confirmation')
                                            <div class="text-danger invalid-message">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" id="confirm">
                          </div>
                        <button type="submit" class="btn button w-100 mb-2">Register</button>
                        <div class="container text-center">
                            <a href="{{route('user.login')}}" class="tambahan text-center">Already a Member ?</a>
                        </div>
                      </form>
                </div>
            </div>
            <div class="col-6 bg-image" style="background-image: url('images/gallery-image-2.jpg');">
            </div>
        </div>
    </div>
</body>
</html>