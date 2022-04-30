<?php

namespace App\Http\Controllers\Resource;

use App\Models\CategoryDetail;
use App\Http\Requests\StoreCategoryDetailRequest;
use App\Http\Requests\UpdateCategoryDetailRequest;
use App\Http\Controllers\Controller;

class CategoryDetailController extends Controller
{
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
