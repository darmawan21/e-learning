<?php

namespace App\Http\Controllers\Guru\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GuruLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruAuthController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('guru.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\GuruLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GuruLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::GURU_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('guru')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/guru/login');
    }
}
