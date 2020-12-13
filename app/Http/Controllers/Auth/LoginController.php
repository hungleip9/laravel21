<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    protected function authenticated(Request $request, $user)
    {

    }

    public function login(Request $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            if(Auth::user()->role == 1&&Auth::user()->role == 3){
                return redirect(route('backend.user.index'));
            }else{
                return redirect(route('frontend.dashboard'));
            }
        }else{
            $request->session()->flash('error','Tài khoản hoặc mật khẩu không đúng');
            return redirect(route('login'));
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('frontend.dashboard'));
    }

}

