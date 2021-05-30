<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\CategoryStoreRequest;

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
        return view('admin.category.index')
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
        return view('admin.category.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
       
        $this->saveCategory($category, $request);
    
        $category->save();
        Session::put('success', 'Catégorie ' . $category->title . ' ajouté avec succès.');
        return redirect('/admin/categories');
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
      
        return view('admin.category.show')->with('category', $category)->with('cat_child', $cat_child);
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
        $active = $this->active($id);
        return view('admin.category.edit')
        ->with('category', $category)
        ->with('categories', $categories)
        ->with('active', $active);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, $id)
    {
        $category = Category::find($id);
        
        $this->saveCategory($category, $request);
        $category->update();
        
        return redirect('/admin/categories');
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
        return redirect('/admin/categories');
    }
    public function saveCategory($category, $request){
        $category->title = $request->title;
        $category->description = $request->description;
        $category->active = $request->active;
        $category->id_parent = $request->category_id;
    }

    public function active($id){
        $active = Category::find($id)->active;
        return $active;
    }
    public function getActiveCategories(){
        $categories = Category::where('active', 1)->count();
        return $categories;
    }
    public function getInactiveCategories(){
        $categories = Category::where('active', 0)->count();
        return $categories;
    }

   
}
