<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Danhmuccha;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('updated_at','desc')->paginate(5);
        $ctrs = Category::where('parent_id','-1')->get();
        //cache categories number
        $categories_number = Cache::remember('categories_number',5,function (){
            $categories_number = Category::count();
            return $categories_number;
        });
        //end cache categories number
        return view('backend.categories.index',[
            'categories' => $categories,
            'categories_number' => $categories_number,
            'ctrs' =>  $ctrs,
        ]);
    }
    public function showProducts($id){
        $category = Category::find($id);
        $products = $category->product;
        return view('backend.categories.showProduct',[
            'products' => $products
        ]);
    }
    public function create(){
        $categories = Category::all();
        $cts = Category::where('parent_id','-1')->get();
        return view('backend.categories.create',[
            'categories' => $categories,
            'cts' => $cts,
        ]);
    }
    public function  store(StoreCategoryRequest $request){
        $category = new Category();
        $category->name =$request->get('name');
        $category->parent_id =$request->get('parent_id');
        $category->depth =$request->get('depth');
        $category->save();
        if($category->save()){
            $request->session()->flash('success','Tạo mới thành công');
        }else{
            $request->session()->flash('error','Tạo mới không thành công thành công');
        }
        return redirect()->route('backend.categories.index');
    }
    public function edit($id){
        $category = Category::find($id);
        $categories = Category::where('parent_id','-1')->get();
        return view('backend.categories.edit',[
            'category' => $category,
            'categories' => $categories,

        ]);
    }
    public function upload(Request $request,$id){
        //lay du lieu tu form
        $name = $request->get('name');
        $parent_id = $request->get('parent_id');
        //upload du lieu
        $category = Category::find($id);
        $category->name =$name;
        $category->parent_id =$parent_id;
        $category->save();
        return redirect(route('backend.categories.index'));
    }
//    public function detail($id){
//        $category = Category::find($id);
//        $products = $category->products;
//        return view('frontend.shop-detail',[
//            'category' => $category,
//            'products' => $products
//        ]);
//    }
    public function destroy(Request $request,$id)
    {
        $category = Category::find($id);
        if($category->parent_id == -1){
            $categories = Category::where('parent_id',$id)->get();
            foreach ($categories as $ct){
                $ct->parent_id = null;
                $ct->save();
            }
        }
        $category->delete();
        //session
        if (!$category->delete()){
            $request->session()->flash('success','Xóa thành công');

        }else{
            $request->session()->flash('error','Xóa không thành công');
        }
        //end session
        return redirect()->route('backend.categories.index');
    }

}
