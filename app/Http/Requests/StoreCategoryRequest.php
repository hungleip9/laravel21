<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        'name' =>  ['required', 'min:2','max:150'],
        'parent_id' => ['required','max:150'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được nhiều hơn :max',
            'in:' => ':attribute không hợp lệ',
        ];

    }
}
