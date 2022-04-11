<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .bg-image {
            background-image: url("images/gallery-image-2.jpg");
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
        }
        .is-invalid {
            border-color:red !important; 
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
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="nama" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                          </div>
                        <button type="submit" class="btn button w-100 mb-2">Register</button>
                        <div class="container text-center">
                            <a href="{{route('user.login')}}" class="tambahan text-center">Already a Member ?</a>
                        </div>
                      </form>
                </div>
            </div>
            <div class="col-6 bg-image">
            </div>
        </div>
    </div>
</body>
</html>