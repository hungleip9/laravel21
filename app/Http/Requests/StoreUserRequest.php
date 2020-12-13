<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreUserRequest extends FormRequest
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


    public function rules()
    {
//        $users = User::get();
//        foreach ($users as $user){
//            $string = $user->status.',';
//        }

        $method = Request::method();
        $rules = [

            'name' => ['required','min:4','max:150'],
            'email' => ['required','email'],

        ];
        if($method == 'POST'){
            $rules['password'] = ['required','min:8','max:150'];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'required' =>  ':attribute Không được trống nhé',
            'min' =>  ':attribute Không được nhỏ hơn :min',
            'max' =>  ':attribute Không được lớn hơn :max',
        ];
    }
}
