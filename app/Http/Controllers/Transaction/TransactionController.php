<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($transaction){
        $transaction->status = request()->status;
        $transaction->save();
        $transaction->user
                    ->notify(new UserNotification('Transaksi dengan id '
                                .$transaction->id.' telah'
                                .request()->status),'transaksi');
        return back()->with('message','transaksi '.$transaction->id.' berhasil diupdate !');
    }
    public function index()
    {
        //
    }
    public static function getTransactionByYear($year){
        $data = \DB::select('SELECT MONTH(updated_at) AS Bulan,COUNT(updated_at) FROM `transactions` WHERE `status` = "Dibayar" AND YEAR(updated_at)="2022" GROUP BY YEAR(updated_at), MONTH(updated_at)');
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction = Transaction::create([
            'timeout bla bla'
        ]);
        $admin = Admin::all();
        $admin->notify(new AdminNotification('Transaksi Baru ! id = '.$transaction->id
                      ),'new transaction',route('admin.transaksi',$transaction->id));
        return 'kemana ?';
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
