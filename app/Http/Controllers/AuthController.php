<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $remember = $request->remember ? true : false;

        $guards = ['user', 'staf', 'dekan', 'admin'];
        $redirects = [
            'user' => fn() => redirect()->intended(route('index')),
            'staf' => fn() => redirect()->intended(route('staf.dashboard')),
            'dekan' => fn() => redirect()->intended(route('dekan.dashboard')),
            'admin' => fn() => redirect()->intended(route('admin.dashboard')),
        ];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt([
                'email' => $request->identifier,
                'password' => $request->password,
            ], $remember)) {
                $request->session()->regenerate();
                return $redirects[$guard]();
            }

            if ($guard === 'user' && Auth::guard($guard)->attempt([
                'nim' => $request->identifier,
                'password' => $request->password,
            ], $remember)) {
                $request->session()->regenerate();
                return $redirects[$guard]();
            }
        }

        return back()->with('error', __('auth.failed'));
    }

    /**
     * Logout user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        Auth::guard('staf')->logout();
        Auth::guard('dekan')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
