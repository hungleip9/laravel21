<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  ['required', 'min:4','max:150'],
            'email' => ['required','email','min:10','max:150'],
            'phone' => ['required','min:10','max:150'],
            'address' => ['required','min:10','max:150'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được nhiều hơn :max',
            'email' => ':attribute không đúng định dạng',
        ];

    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }
}
