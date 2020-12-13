<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;

use App\Task;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('updated_at','desc')->paginate(5);
//        dd($products);
        //tao cache dem products
        $products_number = Cache::remember('products_number',5,function (){
            $products_number = Product::count();
            return $products_number;
        });
        return view('backend.products.index',[
            'products' => $products,
            'products_number' => $products_number
        ]);

    }
    public function showImages($id){
        $product = Product::find($id);
        $images = $product->image;
        return view('backend.products.showImage',[
            'images' => $images
        ]);

    }
    public function showComment($id){
        $product = Product::find($id);
        $comments = $product->comments;
        $numbers = $comments->count();
        return view('backend.products.showComment',[
            'comments' => $comments,
            'numbers' => $numbers,
        ]);
    }
    public function create(){
        $categories = Category::get();
        return view('backend.products.create')->with([
            'categories' => $categories
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');

        //avatar
        $file = $request->file('image');
        $path = Storage::disk('public')
            ->putFileAs('avatar', $file,$file->getClientOriginalName());
        $product->avatar = $path;
        //end avatar

        $product->user_id = Auth::user()->id;

        $product->save();

        //images
        if ($request->hasFile('images')){
            $files = $request->file('images');
            foreach ($files as $file){
                //cach 1 khuyen dung
                $path = Storage::disk('public')
                    ->putFileAs('image', $file,$file->getClientOriginalName());

                $image = new Image();
                $image->name = $file->getClientOriginalName();
                $image->path =$path;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        //end image

        //session
        if ($product->save()){
            $request->session()->flash('success','Tao mới thành công');

        }else{
            $request->session()->flash('error','Tao mới không thành công');
        }
        //end session

        return redirect()->route('backend.product.index');
    }
    public function edit(Product $product){

//        $product = Product::find($id);
//        $user = Auth::user();
//        if ($user->can('update', $product)) {
//            dd('co');
//        }else{
//            dd('ko');
//        }
        $categories = Category::get();
            return view('backend.products.edit',[
                'product' => $product,
                'categories' => $categories
            ]);
    }
    public function update(StoreProductRequest $request,$id){
        //lay du lieu tu form
        $name = $request->get('name');
        $slug = \Illuminate\Support\Str::slug($request->get('name'));
        $category_id = $request->get('category_id');
        $origin_price = $request->get('origin_price');
        $sale_price = $request->get('sale_price');
        $content = $request->get('content');
        $status = $request->get('status');

        //upload du lieu
        $product = Product::find($id);
        $product->name = $name;
        $product->slug = $slug;
        $product->category_id = $category_id;
        $product->origin_price = $origin_price;
        $product->sale_price = $sale_price;
        $product->content = $content;
        $product->status = $status;
        //avatar
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = Storage::disk('public')
                ->putFileAs('avatar', $file,$file->getClientOriginalName());
            $product->avatar = $path;
        }

        //end avatar
        $product->save();
        //images
        if ($request->hasFile('images')){
            $images = $product->image;
            foreach ($images as $img){
                $img->delete();
            }
            $files = $request->file('images');
            foreach ($files as $file){
                //cach 1 khuyen dung
                $path = Storage::disk('public')
                    ->putFileAs('image', $file,$file->getClientOriginalName());
                $image = new Image();
                $image->name = $file->getClientOriginalName();
                $image->path =$path;
                $image->product_id = $id;
                $image->save();
            }


        }
        //end image
        if ($product->save()){
            $request->session()->flash('success','Chỉnh sửa thành công');

        }else{
            $request->session()->flash('error','Tao mới không thành công');
        }
        return redirect(route('backend.product.index'));
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        //images
        if (!empty($product->image)){
            $images = $product->image;
            foreach ($images as $image){
                $image->delete();
            }
        }
        //end image
        $product->delete();
        return redirect()->route('backend.product.index');
    }

}
