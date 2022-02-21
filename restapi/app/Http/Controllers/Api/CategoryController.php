<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->apiResponse(ResultType::Success,Category::all(), 'Categories fetched', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new  Category();
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name);
        $categories->save();
        return $this->apiResponse(ResultType::Success,$categories,"Category Created",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //return $category;
        return $this->apiResponse(ResultType::Success,$category,"Category fetched",200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->price=$request->price;
        $category->save();

        return $this->apiResponse(ResultType::Success,$category,'Category updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->apiResponse(ResultType::Success,null,'Category deleted',200);
    }

    public function custom3(){
        return DB::table('product_categories as pc')
            ->selectRaw('c.name, COUNT(*) as total  ')
            ->join('categories as c','c.id','=','pc.category_id')
            ->join('products as p','p.id','=','pc.product_id')
            ->groupBy('c.name')
            ->orderByRaw('COUNT(*) DESC')
            ->get();
    }

}
