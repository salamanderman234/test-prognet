<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ProductReview;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function get_chart_data(){
        $data_transaction = \DB::select('SELECT MONTH(updated_at) AS bulan,COUNT(updated_at) AS jumlah FROM `transactions` WHERE `status` = "Sampai di tujuan" AND YEAR(updated_at)="2022" GROUP BY YEAR(updated_at), MONTH(updated_at)');
        $transaction = json_encode($data_transaction);
        return $transaction;
    }
    public function get_chart_data_year(){
        $year = [date('Y',strtotime('-2 year')),date('Y',strtotime('-1 year')),date('Y')];
        $data_transaction = \DB::select('SELECT YEAR(updated_at) AS year,COUNT(updated_at) AS jumlah FROM `transactions` WHERE `status` = "Sampai di tujuan" AND (YEAR(updated_at)="'.$year[0].'" OR YEAR(updated_at)="'.$year[1].'" OR YEAR(updated_at)="'.$year[2].'") GROUP BY YEAR(updated_at)');
        $transaction = json_encode($data_transaction);
        return $transaction;
    }

    public function index()
    {
        $new_user = User::where('created_at','>',date("Y-m-d", strtotime("-1 week")))
            ->where('created_at','<',date("Y-m-d"))
            ->count();

        $new_transaction = Transaction::where('updated_at','>',date("Y-m-d", strtotime("-1 week")))
            ->where('updated_at','<',date("Y-m-d"))
            ->where('status','Dibayar')
            ->count();

        $revenue_this_week = DB::table('transaction_details')
            ->join('transactions','transactions.id','=','transaction_details.id')
            ->where('transactions.updated_at','>',date("Y-m-d", strtotime("-1 week")))
            ->where('transactions.updated_at','<',date("Y-m-d"))
            ->where('transactions.status','Dibayar')
            ->count();

        $total_rate = ProductReview::sum('rate');
        $count_rate = ProductReview::all()->count();
        $overall_review = 0;
        if($total_rate!=0 and $count_rate!=0){
            $overall_review =  $total_rate/$count_rate ;
        }
        

        $past_new_user = User::where('created_at','>',date("Y-m-d", strtotime("-2 week")))
            ->where('created_at','<',date("Y-m-d", strtotime("-1 week")))
            ->count();

        $past_new_transaction = Transaction::where('updated_at','>',date("Y-m-d", strtotime("-2 week")))
            ->where('updated_at','<',date("Y-m-d", strtotime("-1 week")))
            ->where('status','Dibayar')
            ->count();

        $revenue_past_week = DB::table('transaction_details')
            ->join('transactions','transactions.id','=','transaction_details.id')
            ->where('transactions.updated_at','>',date("Y-m-d", strtotime("-2 week")))
            ->where('transactions.updated_at','<',date("Y-m-d", strtotime("-1 week")))
            ->where('transactions.status','Dibayar')
            ->count();


        return view('dashboard.admin.home',compact(
            'new_user',
            'new_transaction',
            'revenue_this_week',
            'past_new_user',
            'past_new_transaction',
            'revenue_past_week',
            'overall_review',

        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
