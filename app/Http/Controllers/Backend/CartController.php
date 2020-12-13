<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Mail;

class CartController extends Controller
{
    public function checkout(){
        $items = Cart::content();
        $categories = Category::all();
        $images = Image::all();
        $user_info = Auth::user();
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
            'items' => $items,
            'user_info' => $user_info,
        ]);
    }
    public function store(StoreCartRequest $request){
//        dd($request->product_id);
        //luu thong tin user
        $user = Auth::user();
        $user->address = $request->address;
        $user->phone = $request->phone;
        //luu thong tin order
        $order = new Order();
        $items = Cart::content();
        $order->user_id = $user->id;
        $order->money =\Gloudemans\Shoppingcart\Facades\Cart::total();
        foreach ($items as $item){
            $order->product_id = $item->id;
            $order->save();
        }
        //save
        $user->save();
        return redirect(route('backend.cart.sendMail'));


    }
    public function sendMail(Request $request){
        $user = Auth::user();
        $items = Cart::content();
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'phone' => $user->phone,
            'items' => $items,
        ];
        Mail::send('email',$data,function ($massage){
            $massage->from('hungleip9@gmail.com','OniiChan-Shop');
            $massage->to(Auth::user()->email,Auth::user()->name);
            $massage->subject('Cảm ơn bạn đã đặt hàng tại OniiChan-Shop');
        });
        if(true){
            $request->session()->flash('success','Đơn hàng của quánh khách đang được xử lý, mời kiểm tra Email');
        }else{
            $request->session()->flash('error','Thất bại');
        }
        return redirect(route('frontend.cart.index'));
    }
}
