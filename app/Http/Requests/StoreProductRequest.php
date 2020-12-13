<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            //validate
            'name'            => ['required', 'min:4', 'max:255'],
            'category_id'     => ['required'],
            'origin_price'    => ['required', 'min:1', 'max:20'],
            'sale_price'      => [ 'max:20'],
            'content'         => ['required', 'min:10', 'max:100'],
            'image'          => ['max:3025'],
            'images'          => ['max:3025'],
            'status'          => ['required','in:-1,0,1'],
        //end validate
        ];
    }
    public function  messages()
    {
        return [
            'required' =>  ':attribute Không được trống nhé',
            'min' =>  ':attribute Không được nhỏ hơn :min',
            'max' =>  ':attribute Không được lớn hơn :max',

        ];
    }
    public function attributes()
    {
        return [
          'name' => 'Tên sản phẩm',
          'category_id' => 'ID danh mục',
          'origin_price' => 'Giá gốc',
          'sale_price' => 'Giá khuyến mãi',
          'content' => 'Nội dung',
          'images' => 'Ảnh mô tả',
          'image' => 'avatar',
          'status' => 'tên sản phẩm',
        ];
    }
}
