<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class AuthController
 * @package App\Http\Controllers
 * @author Haze Illias <hazreenaaida@gmail.com>
 */

class AuthController extends BaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegisterForm()
    {
        return view('site.auth.register');
    }

    public function register( Request $request)
    {
        $input = $request->all();

        $validator = (new User)->getValidatorRegistration($input);

        if ($validator->fails()) {
            return $this->responseRedirectBack('Registration failed.', 'error', true, true);
        } else {
            $user = new User();
            $user->fill($request->all());

            if(!$user->save()) {
                return $this->responseRedirectBack('Registration failed.', 'error', true, true);
            }
            return $this->responseRedirectBack('Registration successful. please check your email.', 'success', true, true);
        }
    }

    public function showLoginForm()
    {
        return view('site.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::guard('web')->attempt($credentials)) {
            return $this->responseRedirectBack('Login failed', 'error', true, true);
        }
        return back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('site.home');
    }
}