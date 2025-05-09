<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class AdminServiceController extends Controller
{
    function index(?int $id = null): View
    {
        if($id !== null) {
            return view('admin.content.detail', [
                'title' => 'Редактировать услугу'
            ]);
        }

        return view('admin.content.index', [
            'title'    => 'Услуги',
            'contents' => $this->getServicePagination(),
        ]);
    }

    function getServicePagination(int $page = 5): LengthAwarePaginator
    {
        return Service::query()->with('user')->paginate($page);
    }

    function update()
    {

    }

    function delete()
    {

    }
}
