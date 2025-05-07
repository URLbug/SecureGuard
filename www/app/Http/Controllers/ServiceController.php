<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    function index(?int $id = null): View
    {
        if($id !== null) {
            return view('public.service.detail');
        }

        return view('public.service.index', ['services' => $this->getServices()]);
    }

    protected function getServices()
    {
        return Service::query()->paginate(2);
    }
}
