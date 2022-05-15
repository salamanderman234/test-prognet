<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Notifications\UserNotification;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{

    public function purchase(){
        if(request()->has('items')){
            $items = explode(",",request()->items);
            dd();
        }
    }

    public function index()
    {
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
        $transaction->status = "Dibatalkan";
        $transaction->save();
        return back()->with('message','Transaksi berhasil dibatalkan');
    }
}
