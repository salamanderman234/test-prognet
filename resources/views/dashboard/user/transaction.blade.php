<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-misc.css')}}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <title>Document</title>
</head>
<body class="h-100 d-flex justify-content-center align-items-center">
    <div class="container w-50">
        <div class="row">
            <div class="col-12">
                <h2>Form Transaction</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="mb-3">
                      <label for="adress" class="form-label">Adress</label>
                      <input type="text" class="form-control" id="adress" name="adress">
                    </div>
                    <div class="mb-3">
                      <label for="province" class="form-label">Province</label>
                      <input type="text" class="form-control" id="province" name="province">
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Regency</label>
                        <input type="text" class="form-control" id="regency" name="regency">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>