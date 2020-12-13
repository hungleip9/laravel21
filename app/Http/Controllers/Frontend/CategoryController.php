<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function detail($id){
        $categories = Category::all();
        $images = Image::all();
        $category = Category::find($id);
        $products = $category->product;
        // Cache user number
        $cart_number = Cache::remember('cart_number',5,function (){
            $cart_number = Cart::count();
            return $cart_number;
        });
        // end Cache user number
        return view('frontend.category-detail',[
            'categories' => $categories,
            'category' => $category,
            'images' => $images,
            'products' =>$products,
            'cart_number' => $cart_number
        ]);
    }


}
