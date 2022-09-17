<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember-me' => ['required', 'exclude', 'boolean'],
        ]);

        if (Auth::attempt($credentials, $request->only('remember-me'))) {
            $request->session()->regenerate();

            return to_route('admin.home')->with([
                'success' => 'Logged in successfully.',
            ]);
        }

        return to_route('admin.login')->with([
            'error' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login')->with([
            'success' => 'Logged out successfully',
        ]);
    }
}
