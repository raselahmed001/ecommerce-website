<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $redirectRoute = ($user->role->id == 1) ? 'admin.dashboard' : 'user.dashboard';

        $request->session()->flash('toastr', [
            'type' => 'success',
            'message' => 'Login successful! Welcome back, ' . $user->name,
            'title' => 'Login Success'
        ]);

        return redirect()->route($redirectRoute);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->flash('toastr', [
            'type' => 'error',
            'message' => 'Invalid credentials. Please try again.',
            'title' => 'Login Failed'
        ]);

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => trans('auth.failed'),
            ]);
    }


}
