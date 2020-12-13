<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    public function index(){
    }
    public function postcomment(StoreCommentRequest $request,$id){
        $product_id = $id;
        $comments = new Comment;
        $comments->product_id = $product_id;
        $comments->user_id = Auth::user()->id;
        $comments->status = 0;
        $comments->comment = $request->comment;
        $comments->save();
        if($comments->save()){
            $request->session()->flash('success','Bình luận của bạn đã được gửi đi, chờ xét duyệt');
        }else{
            $request->session()->flash('error','Bình luận của bạn chưa được gửi đi, kiểm tra lại');
        }
        return redirect(route('frontend.product.detail',$product_id));
    }
    public function acComment(Request $request,$id){
        $comments = Comment::find($id);
        $comments->status = 1;
        $comments->save();
        if($comments->save()){
            $request->session()->flash('success','Cập nhật thành công!');
        }else{
            $request->session()->flash('error','Cập nhật không thành công!');
        }
       return back();

    }
    public function notAcComment(Request $request,$id){
        $comments = Comment::find($id);
        $comments->status = 0;
        $comments->save();
        if($comments->save()){
            $request->session()->flash('success','Cập nhật thành công!');
        }else{
            $request->session()->flash('error','Cập nhật không thành công!');
        }
        return back();

    }
    public function destroy($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        return redirect(route('backend.product.showComment',$comments->product_id));
    }
}
