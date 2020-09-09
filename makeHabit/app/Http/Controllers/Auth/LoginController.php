<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected function redirectTo()
    {
        session()->flash('flash_success', 'ログインしました');
        return '/habit';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guestLogin(Request $request)
    {
        $inputs = $request->input();
        $inputs['e-mail'] = 'Banjo@gmai.com';
        $inputs['password'] = 'banjobanjo';
        if (Auth::attempt(['email' => $inputs['e-mail'], 'password' => $inputs['password']])) {
            session()->flash('flash_success', 'ログインしました');
            return redirect()->route('habit.index');
        }
        return back();
    }

    public function loggedOut(Request $request)
    {
        session()->flash('flash_success', 'ログアウトしました');
        return redirect('/login');
    }
}
