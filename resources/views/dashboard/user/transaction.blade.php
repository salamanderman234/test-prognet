<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content= "{{ csrf_token() }}">
    <meta name="total-weight" content= "{{ $weight }}">
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
<body class="h-100 d-flex justify-content-center align-items-center bg-secondary">
    <div class="container w-50 bg-light p-5 rounded shadow">
        <div class="row">
            <div class="col-12 ">
                <h2 class="text-center">Form Transaction</h2>
            </div>
        </div>
        <div class="row px-5">
            <div class="col-12">
                @php
                    $products = [];
                    if(isset($product)){
                        $products = [["product"=>$product->id,"qty"=>$qty,"price"=>$product->price]];
                    }else {
                        foreach($carts as $cart){
                            array_push($products,["product"=>$cart->product->id,"qty"=>$cart->qty,"price"=>$cart->product->price]);
                        }
                    }
                @endphp
                <form action="{{ route('user.purchase.save',['sub_total'=>$total,'products'=>$products]) }}" method="post">
                    @csrf
                    <input id="shipping_cost" type="text" name="shipping_cost" hidden>
                    <input id="sub_total" type="text" name="sub_total" value="{{ $total }}" hidden>
                    <input id="total" type="text" name="total" value="{{ $total }}" hidden>
                    <input id="shipping" type="text" name="shipping_cost" value="0" hidden>
                    <div class="mb-3">
                      <label for="adress" class="form-label">Adress</label>
                      <input required type="text" class="form-control w-100 @error('address') is-invalid @enderror" id="adress" name="address">
                    </div>
                    {{-- <div class="mb-3">
                      <label for="province" class="form-label">Province</label>
                      <input type="text" class="form-control w-100" id="province" name="province" readonly>
                    </div> --}}
                    <div class="mb-3">
                        <label for="province" class="form-label">Regency</label>
                        <select id="regency" class="form-control w-100 change @error('regency') is-invalid @enderror" required>
                            <option value="" selected>Pilih Kota Tujuan</option>
                            @foreach ($regencies as $regency)
                                <option value="{{ $regency->city_id }}">{{ $regency->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" id="province" name="province" hidden>
                    <input type="text" id="regency-form" name="regency" hidden>
                    <div class="mb-3">
                        <label for="province" class="form-label">Courier</label>
                        <select name="courier" id="courier" class="form-control w-100 change">
                            @foreach ($couriers as $courier)
                                <option value="{{ $courier->id }}">{{ $courier->courier }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-12  ">
                                Products :
                            </div>
                        </div>
                        @if (isset($carts))
                            @foreach ($carts as $cart)
                                <div class="row">
                                    <div class="col-12">
                                        <span>{{ $cart->product->product_name }} ({{ $cart->qty }})</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-12">
                                    <span>{{ $product->product_name }} ({{ $qty }})</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="container p-0 mb-5">
                        <div class="row">
                            <div class="col-6">
                                <span class="d-block">Harga</span>
                                <span class="d-block">Ongkir</span>
                                <span class="d-block">Total</span>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <div class="box">
                                    <span class="d-block">Rp. 
                                        <span id="harga">
                                            {{ number_format($total) }}
                                        </span>
                                    </span>
                                    <span class="d-block">Rp. 
                                        <span id="ongkir">
                                            0
                                        </span>
                                    </span>
                                    <span  class="d-block">Rp. 
                                        <span id="total_fiks">
                                            {{ number_format($total) }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="container d-flex justify-content-center">
                        <a role="button" href="/" class="btn btn-danger me-3">Batal</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        var weight = $('meta[name="total-weight"]').attr('content')
        var csrf = $('meta[name="csrf-token"]').attr('content')
        var courier = $("#courier")
        var target = $("#regency")
        var ongkir = $("#ongkir")
        var harga = $("#harga")
        var total_fiks = $("#total_fiks")
        var shipping = $("#shipping")
        var total= $("#total")
        $(".change").change(function(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': csrf }
            });
            request = $.ajax({
                url: "{{ route('user.get_shipping_cost') }}",
                type: "post",
                data: {
                    origin: '114',
                    target: target.val(),
                    weight: weight,
                    courier: $("#courier option:selected").text()
                }
            });
            request.done(function(response,textStatus,jqXHR){
                var response_json = JSON.parse(response).rajaongkir
                var destination_detail = response_json.destination_details
                var cost = response_json.results[0].costs[0].cost[0].value
                var total_harga_termasuk_ongkir = parseInt(harga.text().replace(/,/g,'')) + parseInt(cost)

                $("#province").val(destination_detail.province)
                $("#regency-form").val(destination_detail.city_name)
                
                ongkir.text(cost.toLocaleString('en-US'))
                shipping.val(cost)
                total.val(total_harga_termasuk_ongkir)
                total_fiks.text(total_harga_termasuk_ongkir.toLocaleString('en-US'))

                console.log(total.val())
            })
        })
    })
</script>
</html>