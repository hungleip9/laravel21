<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use App\Models\User_info;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController
{
    public function index(){
        $users = User::orderBy('id')->paginate(5);
//        $users = DB::table('users')->get();
        // Cache user number
            $user_number = Cache::remember('user_number',5,function (){
                $user_number = User::count();
                return $user_number;
            });
        // end Cache user number


        return view('backend.users.index',[
            'users' => $users,
            'user_number' => $user_number,
        ]);

    }
    public function create(){
        return view('backend.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $password = $request->get('password');



        // Tạo dữ liệu mới
        $user = new User();
        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        $user->role = 2;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        //session
        if ($user->save()){
            $request->session()->flash('success','Tao mới thành công');

        }else{
            $request->session()->flash('error','Tao mới không thành công');
        }
        //end session
        return redirect()->route('backend.user.index');

    }
    public function showProduct($id){
        $user = User::find($id);
        $products = $user->product;
        return view('backend.users.showProduct',[
            'products' => $products
        ]);
    }
    public function test(){
//        $user = User::find(1);
////        dd($user->userInfo->fullname);
//        $userInfo = $user-> userInfo;
////        dd($userInfo->fullname);
//        $user_info = UserInfo::find(1);
//        $user = $user_info->user;
//        dd($user->email);
        //quan he 1 nhieu
//        $category = Category::find(1);
//        $products = $category->products;
////        dd($products);
//        foreach ($products as $product){
//            echo $product->name."\n";
//        }
//        $products = Category::find(1)->products()->where('status',1)->get();
//        dd($products);
//        $products = Products::find(1);
//        $category = Category::find(1);
//        $products = $category->products()->save($products);

//        $category = Category::find(3);

//        $product = $category->products()->create([
//            'name' => 'san pham create 3',
//            'slug' => 'h1',
//            'status' => '10',
//            'origin_price' => '10000',
//            'sale_price' => '5000',
//            'content' => 'Noi dung demo',
//            'user_id' => 1
//        ]);
        $order = Order::find(1);
        $product_id = 1;
        $product_id_2 = 2;
        $product_id_3 = 3;
//        dd($order);
        $order->products()->attach([
            $product_id,
            $product_id_2,
            $product_id_3
        ]);
    }
    public function edit($id){
        $user = User::find($id);
        return view('backend.users.edit',[
                'user' => $user,
        ]);
    }
    public function upload(StoreUserRequest $request,$id){
        //lay du lieu tu form
        $name = $request->get('name');
        $email = $request->get('email');
        $role= $request->get('role');
        //upload du lieu len
        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->role = $role;
        $user->save();
        return redirect(route('backend.user.index'));
    }
    public function showComment($id){

        $user = User::find($id);
        $comments = $user->comments;
        $numbers = $comments->count();
        return view('backend.users.showComment',[
            'comments' => $comments,
            'numbers' => $numbers,
        ]);
    }
    public function destroy(Request $request,$id)
    {
        $user = User::find($id);

            $user->delete();
        if (!$user->delete()){
            $request->session()->flash('error','Xóa thành công');
        }else{
            $request->session()->flash('success','Xóa không thành công');
        }
            return back();
    }
}
