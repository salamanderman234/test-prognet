<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Support\Str;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;


class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::where('id','!=',0)->paginate(5)->withQueryString();
        Paginator::useBootstrap();
        return view('dashboard.admin.tables.product_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.tables.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $credentials = $request->validated();
        $credentials['slug'] = Str::slug($request->category_name);
        ProductCategory::create($credentials);
        return redirect()->route('admin.table.category.index')->with('message','Kategori Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        return view('dashboard.admin.tables.product_category.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        $category = $category;
        return view('dashboard.admin.tables.product_category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update( ProductCategory $category, UpdateProductCategoryRequest $request)
    {
        if($category->category_name != $request->category_name){
            $request->validated();
            $category->category_name = $request->category_name;
            $category->slug = Str::slug($request->category_name);
            $category->save();
        }
        return redirect()->route('admin.table.category.index')->with('message','Edit Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.table.category.index')->with('message','Delete Successfully');
    }
}
