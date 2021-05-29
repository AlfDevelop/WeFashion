<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('id_parent', 0)->paginate(5);
        $countCategories = Category::all()->count();
        $countActiveCategories = $this->getActiveCategories();
        $countInactiveCategories = $this->getInactiveCategories();
        return view('category.index')
        ->with('categories', $categories)
        ->with('countCategories', $countCategories)
        ->with('countActiveCategories', $countActiveCategories)
        ->with('countInactiveCategories', $countInactiveCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->active = $request->active;
        $category->id_parent = $request->category_id;
     
        $category->save();
        return redirect('/home/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $cat_child = Category::where('id_parent', $id)->get();
      
        return view('category.show')->with('category', $category)->with('cat_child', $cat_child);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        return view('category.edit')->with('category', $category)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->active = $request->active;
        $category->id_parent = $request->category_id;
     
        $category->update();
        return redirect('/home/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $cat_child = Category::where('id_parent', $category->id);
        $cat_child->delete();
        $category->delete();
        return redirect('/home/categories');
    }

    public function getActiveCategories(){
        $categories = Category::where('active', 1)->count();
        return $categories;
    }
    public function getInactiveCategories(){
        $categories = Category::where('active', 0)->count();
        return $categories;
    }

    public function getCategoryProducts(Category $category){
        $CategoryProducts = Category::with('products')->get();
        dd($CategoryProducts);
        return view('front.partials.categoryproducts')->with('CategoryProducts', $CategoryProducts);
        
    }
    public function getCategory($Category_id)
    {
        $category = Category::find($Category_id);
        if($category !== null){
            $products = $category->products->where('active', 1);
            return view('front.partials.categoryproducts')->with('products', $products);
        }
    }
   
}
