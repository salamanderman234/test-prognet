<?php

namespace App\Http\Controllers\Transaction;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Admin;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Notifications\UserNotification;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\Transaction\TransactionController;

class TransactionController extends Controller
{
    public function get_shipping_cost(){
        $origin = request()->origin;
        $target = request()->target;
        $courier = request()->courier;
        $weight = request()->weight;

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$target."&weight=".$weight."&courier=".$courier,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: e669a180581c5ebadecff30e10148331"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "error";
        } else {
            return $response;
        }
    }
    public function get_province_list(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e669a180581c5ebadecff30e10148331"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "kesalahan";
        } else {
            return $response;
        }
    }

    public function get_regency_list(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e669a180581c5ebadecff30e10148331"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "kesalahan";
        } else {
            return $response;
        }
    }

    public function purchase(){

        if(request()->total != null){
            $total = request()->total;
            $couriers = Courier::all();
            $regencies = json_decode(TransactionController::get_regency_list())->rajaongkir->results;

            if(request()->has('items')){
                $items = explode(",",request()->items);
                $carts = [];
                $weight = 0;
                foreach($items as $item){
                    $cart = Cart::find($item);
                    $cart->status = "Checkout";
                    $cart->save();
                    array_push($carts,$cart);
                    $weight += $cart->product->weight;
                }
                return view('dashboard.user.transaction',compact('carts','total','regencies','weight','couriers'));
            }else {
                
                $qty = request()->qty_purchase;
                $product = Product::find(request()->products);
                $total = request()->total;
                $weight = $product->weight;
                return view('dashboard.user.transaction',compact('product','total','regencies','weight','couriers','qty'));
            }
        }else {
            dd("asiap");
            return back();
        }
    }

    public function purchase_save(){    

        $transaction = Transaction::create([
            'adress'=>request()->address,
            'regency'=>request()->regency,
            'province'=>request()->province,
            'total'=>request()->total,
            'shipping_cost'=>request()->shipping_cost,
            'sub_total'=>request()->sub_total,
            'user_id'=>auth()->user()->id,
            'courier_id'=>request()->courier,
            'status'=>'Menunggu verifikasi',
            'timeout'=> date('Y-m-d', strtotime('+1 days'))
        ]);
        $data = request()->products;
        if(count($data)>1){
            foreach($data as $item){
                $final_price = $item['price'];
                $percentage = 0.0;
                $discount = Product::find($item['product'])->discounts()
                    ->where('start','<=',Carbon::now())
                    ->where('end','>=',Carbon::now())
                    ->get();
                if(count($discount)>0){
                    $percentage = $discount->first()->percentage;
                    $final_price = $item['price'] - ($percentage/100*$item['price']);
                }
                TransactionDetail::create([
                    'transaction_id'=>$transaction->id,
                    'product_id'=>$item['product'],
                    'qty'=>$item['qty'],
                    'discount'=>$percentage,
                    'selling_price'=>$final_price
                ]);
            }
        }else {
            $final_price = $data[0]['price'];
            $percentage = 0.0;
            $discount = Product::find($data[0]['product'])->discounts()
                ->where('start','<=',Carbon::now())
                ->where('end','>=',Carbon::now())
                ->get();
            if(count($discount)>0){
                $percentage = $discount->first()->percentage;
                $final_price = $data[0]['price'] - ($percentage/100*$data[0]['price']);
            }
            TransactionDetail::create([
                'transaction_id'=>$transaction->id,
                'product_id'=>$data[0]['product'],
                'qty'=>$data[0]['qty'],
                'discount'=>$percentage,
                'selling_price'=>$final_price
            ]);
        }
        return redirect()->route('user.transactions');
    }


    public function upload_proof(Transaction $transaction){
        $destination_path = 'images/proof';
        $path = request()->file('proof')->store($destination_path);

        $transaction->proof_of_payment = $path;

        $admins = Admin::all();
        Notification::send($admins, new AdminNotification(
            "Transaksi dengan id-".$transaction->id." telah mengupload bukti pembayaran",
            "transaction",
            route("admin.transaction.edit",$transaction)
        ));
        $transaction->save();

        return back();
    }

    public function index()
    {
        $expired_transaction = Transaction::where('timeout','<=',Carbon::now())->where('status','Menunggu verifikasi');
        foreach($expired_transaction as $transaction){
            $transaction->status = "Expired";
            $transaction->save();
        }
        $transactions = Transaction::orderBy('updated_at','desc')->paginate(5)->withQueryString();
        Paginator::useBootstrap();
        foreach($transactions as $transaction){

            $transaction->product = $transaction->details->count();
            $transaction->username = $transaction->user->name;
        }
        return view('dashboard.admin.transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $details = $transaction->details;
        $transaction->username = $transaction->user->name;
        return view('dashboard.admin.transactions.edit',compact('transaction','details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Transaction $transaction)
    {
        $transaction->status = request()->status;
        $transaction->save();
        $user = $transaction->user;

        $user->notify(new UserNotification(
            'Transaksi dengan id-'.$transaction->id.' '.$transaction->status,
            'transaction',
            route('user.transactions')
        ));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function cancel(Transaction $transaction)
    {
        if($transaction->status == "Menunggu verifikasi"){
            $transaction->status = "Dibatalkan";
            $transaction->save();
        }

        return back()->with('message','Transaksi berhasil dibatalkan');
    }
}
