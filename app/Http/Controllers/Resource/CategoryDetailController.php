<?php

namespace App\Http\Controllers\Resource;

use App\Models\CategoryDetail;
use App\Http\Requests\StoreCategoryDetailRequest;
use App\Http\Requests\UpdateCategoryDetailRequest;
use App\Http\Controllers\Controller;

class CategoryDetailController extends Controller
{
    public function change(){
        request()->validate([
            'category'=>'required'
        ]);
        if(request()->has('product_id')&&request()->has('product_category_id')){
            $check = CategoryDetail::where('product_id',request()->product_id)
                ->where('category_id',request()->category)
                ->get();
            if(count($check)==0){
                $category_detail = CategoryDetail::where('product_id',request()->product_id)
                    ->where('category_id',request()->product_category_id)
                    ->get();
                if(count($category_detail)==1){
                    $category_detail[0]->category_id = request()->category;
                    $category_detail[0]->save();
                }
            }else {
                return back()->with('message','Category yang dimasukan sama');
            }
        }
        return back()->with('message','Category Berhasil Diubah !');
    }

    public function remove(){
        if(request()->has('product_id')&&request()->has('product_category_id')){
            $category_detail = CategoryDetail::where('product_id',request()->product_id)
                ->get();
            if(count($category_detail)>1){
                $category_detail[0]->delete();
            }else {
                return back()->with('message','Produk Minimal Harus Memiliki 1 Kategori');
            }
        }
        return back()->with('message','Category Berhasil Dihapus !');
    }

    public function add(){
        request()->validate([
            'category'=>'required'
        ]);
        if(request()->has('product_id')){
            CategoryDetail::create([
                'product_id'=>request()->product_id,
                'category_id'=>request()->category
            ]);
        }
        return back()->with('message','Category Berhasil Ditambah !');

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
     * @param  \App\Http\Requests\StoreCategoryDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDetail $categoryDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDetail $categoryDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryDetailRequest  $request
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryDetailRequest $request, CategoryDetail $categoryDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDetail $categoryDetail)
    {
        //
    }
}
