<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $validated = $request->validated();

        $hashedPassword = Auth::user()->password;

        if(Hash::check($validated['oldPassword'], $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($validated['password']);
            $user->save();
            Auth::logout();
           
            $notification = array(
                'message' => 'Password updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else{

        // return redirect()->back()->with('error', 'Old password is incorrect');
            $notification = array(
                'message' => 'Old password is incorrect',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
