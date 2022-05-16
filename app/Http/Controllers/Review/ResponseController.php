<?php

namespace App\Http\Controllers\Review;

use App\Models\Response;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;

class ResponseController extends Controller
{
    public function reply(ProductReview $review){
        return view('dashboard.admin.reviews.create',compact('review'));
    }
    public function reply_edit(ProductReview $review){
        $response = $review->responses->first();
        return view('dashboard.admin.reviews.edit',compact('response','review'));
    }

    public function reply_edit_save(ProductReview $review){
        $response = $review->responses->first();
        $response->content = request()->content;
        $response->save();
        return back()->with('message','Reply berhasil diedit');
    }
    
    public function reply_save(ProductReview $review){
        $admin = Auth::guard('admin')->user();
        Response::create([
            'review_id'=>$review->id,
            'admin_id'=>$admin->id,
            'content'=>request()->content
        ]);
        $product = $review->product;
        $user = $review->user;
        $user->notify(new UserNotification(
            "Review mu Dibalas oleh admin ! ( Review pada product ".$product->product_name." )",
            "review",
            route("home.product_detail",['category'=>$product->categories->first(),'product'=>$product])
        ));
        return redirect()->route('admin.review.index')->with('message','Berhasil membalas pesan');
    }

    public function response(){
        request()->validate([
            'content'=>'max:100|required'
        ]);
        $response = Response::create([
            'review_id'=>request()->review_id,
            'admin_id'=>request()->admin_id,
            'content'=>request()->content,
        ]);
        $response->review
                 ->user
                 ->notify(new UserNotification(
                     'Admin '.$response->admin->name.
                     ' membalas review anda !'
                 ),'response');
        return back()->with('message','Berhasil memposting balasan !');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResponseRequest  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResponseRequest $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
