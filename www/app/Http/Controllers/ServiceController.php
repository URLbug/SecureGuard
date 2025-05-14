<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ServiceController extends Controller
{
    function index(Request $request, ?int $id = null): View
    {
        if(strpos($request->url(), '/price')) {
            return view('public.service.price', ['services' => Service::getServiceAll()]);
        }

        if($id !== null) {
            return view('public.service.detail', ['service' => Service::getServiceById($id)]);
        }

        return view('public.service.index', ['services' => Service::getServicesPaginate(true, 3)]);
    }
}
