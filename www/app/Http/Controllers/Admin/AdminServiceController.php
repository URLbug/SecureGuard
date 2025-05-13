<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;

class AdminServiceController extends Controller
{
    function index(Request $request, ?int $id = null): View|RedirectResponse
    {
        if($id !== null) {
            $element = Service::getServiceById($id);

            if($request->isMethod('PATCH')) {
                return $this->update($request, $element);
            }

            return view('admin.content.detail', [
                'title'   => 'Редактировать услугу',
                'content' => $element,
                'route'   => 'admin-service',
            ]);
        }

        return view('admin.content.index', [
            'title'    => 'Услуги',
            'contents' => Service::getServicesPaginate(5),
            'route'    => 'admin-service',
        ]);
    }

    function store(Request $request)
    {

    }

    function update(Request $request, Service $service): RedirectResponse
    {
        dd($request->all());

        return redirect()->route('admin-service');
    }

    function destroy(Request $request, Service $service)
    {

    }
}
