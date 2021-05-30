<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $countProduct = Product::all()->count();
        $countActiveProduct = $this->getActiveProducts();
        $countInactiveProduct = $this->getInactiveProducts();
        return view('product.index')->with('products', $products)->with('countActiveProduct', $countActiveProduct)->with('countInactiveProduct', $countInactiveProduct)->with('countProduct', $countProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product.create')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $product = new Product();
        $this->saveProduct($product, $request);
        $product->save();
        return redirect('/home/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Product::find($id);
       
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categories = Category::all();
        $product = Product::find($id);
        $array = $this->getSize($id);
        $active = $this->active($id);
        $category_id = $this->getCategory($id);
        return view('product.edit')
        ->with('product', $product)
        ->with('categories', $categories)
        ->with('active', $active)
        ->with('category_id', $category_id)
        ->with('array', $array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $this->saveProduct($product, $request);
        $product->update();
        return redirect('/home/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/home/products');
    }
    public function saveProduct($product, $request){
        $product->name = $request->name;
        $product->description = $request->description;
        $product->reference = $request->reference;
        $product->active = $request->active;
    
        $product->price = $request->price;
        $product->size = implode(';', $request->size);
        $product->status = $request->status;
        if(!empty($request->file('image'))){
            $extension = $request->file('image')->extension();
            $product->image = $product->name . '.' . $extension;
            $request->file('image')->storeAs('public/images/', $product->name . '.' . $extension);
        }
        
        $product->category_id = $request->category_id;
    }
    public function getActiveProducts(){
        $product = Product::where('active', 1)->count();
        return $product;
    }
    public function getInactiveProducts(){
        $product = Product::where('active', 0)->count();
        return $product;
    }

    public function active($id){
        $active = Product::find($id)->active;
        return $active;
    }
    public function getCategory($id){
        $category = Product::find($id)->category_id;
        return $category;
    }
    public function getSize($id){
        $getSize = Product::find($id)->size;
        $size = explode(";", $getSize);
        return $size;
    }

        public function deleteImage($id){
            $product =   Product::find( $id);
            $product->image = '';
            $product->update(); 
            return redirect('/home/products/'.$id.'/edit');
        }
   
}
