<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ProductStoreRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        $countProduct = Product::all()->count();
        $countActiveProduct = $this->getActiveProducts();
        $countInactiveProduct = $this->getInactiveProducts();
        return view('admin.product.index')->with('products', $products)->with('countActiveProduct', $countActiveProduct)->with('countInactiveProduct', $countInactiveProduct)->with('countProduct', $countProduct);
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
        return view('admin.product.create')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        
        $product = new Product();
        $this->saveProduct($product, $request);
        $product->save();
        Session::put('success', 'Produit ' . $product->name . ' ajouté avec succès.');
        return redirect('/admin/products');
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
       
        return view('admin.product.show')->with('product', $product);
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
        $sizes = $this->getSize($id);
        $active = $this->active($id);
        $category_id = $this->getCategory($id);
        return view('admin.product.edit')
        ->with('product', $product)
        ->with('categories', $categories)
        ->with('active', $active)
        ->with('category_id', $category_id)
        ->with('sizes', $sizes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $product = Product::find($id);
        $this->saveProduct($product, $request);
        $product->update();
        return redirect('/admin/products');
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
        return redirect('/admin/products');
    }

    /* 
        Function to store data from request in upload or store functions
    */
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

    /* 
        Function to get active products count in products panel on backoffice
    */
    public function getActiveProducts(){
        $product = Product::where('active', 1)->count();
        return $product;
    }

    /* 
        Function to get inactive products count in products panel on backoffice
    */
    public function getInactiveProducts(){
        $product = Product::where('active', 0)->count();
        return $product;
    }

    /* 
        Function to check if product is active or not to show icon
    */
    public function active($id){
        $active = Product::find($id)->active;
        return $active;
    }

    /* 
        Function to get category from a product
    */
    public function getCategory($id){
        $category = Product::find($id)->category_id;
        return $category;
    }
    /* 
        Function to get size from a product
    */
    public function getSize($id){
        $getSize = Product::find($id)->size;
        $size = explode(";", $getSize);
        return $size;
    }
    /* 
        Function to delete image from product in product edit page
    */
    public function deleteImage($id){
        $product =   Product::find( $id);
        $product->image = '';
        $product->update(); 
        return redirect('/admin/products/'.$id.'/edit');
        }
   
}
