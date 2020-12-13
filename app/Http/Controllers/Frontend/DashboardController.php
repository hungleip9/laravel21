<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Danhmuccha;
use App\Models\Image;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(){
        // Cache user number
        $cart_number = Cache::remember('cart_number',5,function (){
            $cart_number = Cart::count();
            return $cart_number;
        });
        // end Cache user number
        return view('frontend.index',[
            'cart_number' => $cart_number,
        ]);
    }
    public function search(Request $request){
        // Cache user number
        $cart_number = Cache::remember('cart_number',5,function (){
            $cart_number = Cart::count();
            return $cart_number;
        });
        // end Cache user number

        $prts = Product::where('name','like','%'.$request->key.'%')->orWhere('origin_price',$request->key)->get();
        return view('frontend.search',[
            'prts' => $prts,
            'cart_number' => $cart_number,
        ]);
    }

}
