<?php

namespace WeFashion\Http\Controllers\Front;
use WeFashion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use WeFashion\Models\Product;
use WeFashion\Models\Category;

class FrontController extends Controller
{
    public function index(){
        $products = Product::where('active', 1)->paginate(8);
        $countProducts = $this->getCountProducts();
        return view('front.index')->with('products', $products)->with('countProducts', $countProducts);
    }
    public function product($id){
        $product = Product::find($id);
        $sizes = $this->getSize($id);
        return view('front.partials.product')->with('product', $product)->with('sizes', $sizes);
    }
    public function getProductsOnSale(){
        $products = Product::where([
            ['status','sale'],
            ['active', 1]
            ])
            ->paginate(8);
        
            $countProducts = Product::where([
                ['active', 1],
                ['status', 'sale']
            ])->count();
        return view('front.partials.products-sale')->with('products', $products)->with('countProducts', $countProducts);
    }


    public function getCategory($Category_id)
    {
        $category = Category::find($Category_id);
        if($category !== null){
            $products = $category->products()->where('active', 1)->paginate(8);
            $countProducts = $category->products()->where('active', 1)->count();
            return view('front.partials.categoryproducts')->with('products', $products)->with('category', $category)->with('countProducts', $countProducts);
        }
    }

    public function getCountProducts(){
        $countProducts = Product::where('active', 1)->count();
        return $countProducts;
    }
   public function getSize($id){
       $size = Product::find($id)->size;
       $productSizes = explode(";", $size);
       return $productSizes; 
   }
}
