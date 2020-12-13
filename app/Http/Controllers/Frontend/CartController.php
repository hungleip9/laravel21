<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{

    public function index(){
        $items = Cart::content();
        $categories = Category::get();
        $images = Image::all();
        $products = Product::orderBy('updated_at','desc')->paginate(8);

        // Cache user number
        $cart_number = Cache::remember('cart_number',5,function (){
            $cart_number = Cart::count();
            return $cart_number;
        });
        // end Cache user number

        return view('frontend.cart',[
            'categories' => $categories,
            'images' => $images,
            'products' => $products,
            'items' => $items,
            'cart_number' => $cart_number
        ]);
    }
    public function add($id){

        $product = Product::find($id);
        if (!empty($product->sale_price)){
            $sale = $product->sale_price;
        }else{
            $sale = $product->origin_price;
        }
        Cart::add($product->id, $product->name,1,$sale

            ,0,
        [
            'image' => $product->avatar
        ]
        );
        return redirect(route('frontend.cart.index'));
    }
    public function checkout(){
        $categories = Category::all();
        $images = Image::all();
        // Cache user number
        $cart_number = Cache::remember('cart_number',5,function (){
            $cart_number = Cart::count();
            return $cart_number;
        });
        // end Cache user number
        return view('frontend.checkout',[
            'categories' => $categories,
            'cart_number' => $cart_number,
            'images' => $images,
        ]);
    }
    public function remove($cart_id){
        Cart::remove($cart_id);
        return redirect(route('frontend.cart.index'));
    }
}
