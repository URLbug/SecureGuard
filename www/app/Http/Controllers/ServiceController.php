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
            return view('public.service.price', ['services' => $this->getServiceAll()]);
        }

        if($id !== null) {
            return view('public.service.detail', ['service' => $this->getServiceById($id)]);
        }

        return view('public.service.index', ['services' => $this->getServicesPaginate(3)]);
    }

    protected function getServicesPaginate($perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Service::query()->where('active', true)->paginate($perPage);
    }

    protected function getServiceAll($second = 3600)
    {
        return Cache::remember('service-all', $second, function() {
            return Service::query()->where('active', true)->get(['title', 'price']);
        });
    }

    protected function getServiceById(int $id, $second = 3600): Service {
        return Cache::remember('service-id-' . $id, $second, function() use ($id) {
            return Service::query()->findOrFail($id);
        });
    }
}
