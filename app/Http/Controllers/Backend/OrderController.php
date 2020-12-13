<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(5);
        return view('backend.orders.index',[
            'orders' => $orders
        ]);
    }
//    public function store($user_id,$product_id){
//        $user_id =  $user_id;
//        $product_id = $product_id;
//    }
    public function showProducts($id)
    {
        $order = Order::find($id);
        $products = $order->products;
        return view('backend.orders.showProduct',[
            'products' => $products
        ]);
    }
}
