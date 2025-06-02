<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminMakerController extends Controller
{
    function index(Request $request): View|RedirectResponse
    {
        if($request->isMethod('POST')) {
            return $this->store($request);
        }

        $route_back = 'admin-home';
        if($request->has('back')) {
            $route_back = $request->get('back');
        }

        return view('admin.content.detail', [
            'title'      => 'Создать элемент',
            'route'      => 'admin-make',
            'method'     => 'POST',
            'content'    => new Service,
            'route_back' => $route_back,
        ]);
    }

    protected function store(Request $request): RedirectResponse
    {
        $route_back = 'admin-home';
        if($request->has('back')) {
            $route_back = $request->get('back');
        }

        $price = [];
        if($route_back === 'admin-service') {
            $price['price'] = 'required|numeric|min:0';
        }

        $validator = Validator::make($request->all(), [
                'active'        => 'required|string|max:255',
                'title'         => 'required|string|max:255',
                'uploadFile'    => 'required|file|mimes:png,jpg,jpeg|max:2048',
                'description'   => 'required|string|max:500',
            ] + $price
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $modelName = ucfirst(explode('-', $route_back)[1]);
        $modelClass = "\\App\\Models\\$modelName";

        $class = new $modelClass;

        $file = $request->file('uploadFile');
        $fileName = md5(rand(1, 100) . ':' . $file->getFilename()) . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->put($fileName, file_get_contents($file->getRealPath()));

        $array_price = [];
        if($route_back === 'admin-service') {
            $array_price = [
                'price' => $request->get('price'),
            ];
        }

        $class::query()->insert([
            'active'      => $request->get('active') != '0',
            'title'       => $request->get('title'),
            'description' => $request->get('description'),
            'filepath'    => Storage::disk('public')->url($fileName),
            'userId'      => Auth::user()->getAuthIdentifier(),
        ] + $array_price);

        return redirect()->route($route_back);
    }
}
