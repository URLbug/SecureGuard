<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class AdminServiceController extends Controller
{
    function index(): View
    {
        return view('admin.content.index', [
            'title'    => 'Услуги',
            'contents' => $this->getServicePagination(),
        ]);
    }

    function getServicePagination(int $page = 5): LengthAwarePaginator
    {
        return Service::query()->with('user')->paginate($page);
    }

    function edit()
    {

    }

    function delete()
    {

    }
}
