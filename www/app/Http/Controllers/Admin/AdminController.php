<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AdminController extends Controller
{
    function index(Request $request): View | RedirectResponse
    {
        if(!Auth::check()){
            if($request->isMethod('POST')) {
                return $this->auth($request);
            }

            return view('admin.login.index');
        }

        return view('admin.index', [
            'users' => User::query()->where('active', true)->count(),
            'services' => Service::query()->where('active', true)->count(),
            'news' => News::query()->where('active', true)->count(),
        ]);
    }

    function auth(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $isAuth = Auth::guard()->attempt(['username' => $data['username'], 'password' => $data['password']]);

        if(!$isAuth) {
            return redirect()->route('admin-home')
                ->withErrors(['errors' => 'Не верный логин или пароль'])
                ->withInput();
        }

        return redirect()->route('admin-home');
    }

    function logout () {
        Auth::logout();

        return redirect()->route('login');
    }

}
