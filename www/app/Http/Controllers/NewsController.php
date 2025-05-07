<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class NewsController extends Controller
{
    function index(?int $id = null): View
    {
        if($id !== null) {
            return view('public.news.detail', ['news' => $this->getNewsById($id)]);
        }

        return view('public.news.index', ['news' => $this->getNewsPaginate(3)]);
    }

    protected function getNewsPaginate($perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return News::query()->paginate($perPage);
    }

    protected function getNewsById(int $id, $second = 3600): News {
        return Cache::remember('news-id-' . $id, $second, function() use ($id) {
            return News::query()->findOrFail($id);
        });
    }
}
