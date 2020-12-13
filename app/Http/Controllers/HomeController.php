<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // su dung cache
//        Cache::increment('view');
//        $view = Cache::get('view');
//        return $view;

//        if(!Cache::has('user_number')){
//            $user_number = User::count();
//            Cache::put('user_number',$user_number,60+60);
//        }
//        $user_number = Cache::get('user_number'); // cach 1

        $user_number = Cache::remember('user_number',5,function (){
            $user_number = User::count();
           return $user_number;
        }); //cach 2 khuyen dung


        dd($user_number);
        // cach  cookie 1
//        $cookie = cookie('product', 'xin chao cac ban',5);
//        return response('xin chao')->cookie($cookie);
        // cach 2
//        Cookie::queue(Cookie::make('product2','xin chao 2',3));
//        return 1;
//        $value = $request->cookie('product2');
//        $value = Cookie::get('product2');
//        dd($value);








//        $request->session()->put('age','20');
//        session(['name' => 'Hung']);
//        $request->session()->flash('message','tao san pham thanh cong');
//        echo session('message');
//        return 1;
//        $url = Storage::url('file2.txt');//lay link file
//        $contents = Storage::get('file2.txt');//lay noi dung file
//        $exists = Storage::disk('local')->exists('file2.txt');//kiem tra xem co ton tai file khong
//        Storage::copy('file4.txt','public/file4.txt');//copy file
//        Storage::move('file.txt','public/file.txt');//di chuyen file
//        Storage::delete('public/file.txt');//xoa file
//        $files = Storage::files('public');//lay danh sach files
//            $files = Storage::allFiles('public');//Lấy tất cả các file con trong thư mục cùng với tất cả các file trong các thư mục con
//        Storage::disk('public')->makeDirectory('hung');//tao thu muc
//        Storage::disk('public')->deleteDirectory('hung');//xoa thu muc

//        return Storage::download('file2.txt');//download file
//
//
//        Storage::put('file4.txt', 'Contents');//mac dinh luu vao disk local
////        Storage::disk('local')->put('file.txt','Contents');
////        Storage::disk('local2')->put('file2.txt','Contents');
        return view('home');


    }
}
