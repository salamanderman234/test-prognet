<?php

namespace App\Http\Controllers\Resource;

use App\Models\Courier;
use App\Http\Requests\StoreCourierRequest;
use App\Http\Requests\UpdateCourierRequest;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::where('id','!=',0)->paginate(5)->withQueryString();
        Paginator::useBootstrap();
        return view('dashboard.admin.tables.courier.index',compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.tables.courier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourierRequest $request)
    {
        $credentials = $request->validated();
        Courier::create($credentials);
        return redirect()->route('admin.table.courier.index')->with('message','Kurir Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        return view('dashboard.admin.tables.courier.edit',compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourierRequest  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourierRequest $request, Courier $courier)
    {
        if($courier->courier != $request->courier){
            $request->validated();
            $courier->courier = $request->courier;
            $courier->save();
        }
        return redirect()->route('admin.table.courier.index')->with('message','Edit Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect()->route('admin.table.courier.index')->with('message','Edit Successfully');
    }
}
