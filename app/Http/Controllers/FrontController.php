<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class FrontController extends Controller
{
    public function index(){
        $products = Product::where('active', 1)->paginate(15);
        return view('front.index')->with('products', $products);
    }
    public function product($id){
        $product = Product::find($id);
        return view('front.partials.product')->with('product', $product);
    }
    public function getProductsOnSale(){
        $products = Product::where([
            ['status','sale'],
            ['active', 1]
            ])
            ->get();
        return view('front.partials.products-sale')->with('products', $products);
    }

    public function productsForMen(Category $category){
        dd($category->products()->get());
        return view('front.partials.products-men');
    }
}
