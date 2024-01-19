<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $user = User::where('username', '=', $request->username)->first();

        if (Auth::attempt($credentials)) {
            if ($user->rule == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->rule == 'users') {
                return redirect()->route('users.index');
            }
        }
    }

    public function logou()
    {
        Auth::logout();
        return redirect()->route('auth.index');
    }
}
