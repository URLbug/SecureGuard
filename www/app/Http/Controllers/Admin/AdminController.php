<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AdminController extends Controller
{
    function index(): View
    {
        return view('admin.index', [
            'users' => User::query()->where('active', true)->count(),
            'services' => Service::query()->where('active', true)->count(),
            'news' => News::query()->where('active', true)->count(),
        ]);
    }
}
