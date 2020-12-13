<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment'            => ['required', 'min:10', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được nhiều hơn :max',
        ];

    }
    public function attributes()
    {
        return [
            'comment' => 'Nội dung bình luận',
        ];
    }
}
