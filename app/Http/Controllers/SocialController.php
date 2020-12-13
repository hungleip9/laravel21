<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function getInfo($social){
        return Socialite::driver($social)->redirect();
    }
    public function checkInfo($social){
        $info = Socialite::driver($social)->user();
        dd($info);
    }
}
