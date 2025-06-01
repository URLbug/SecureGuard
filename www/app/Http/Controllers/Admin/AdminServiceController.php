<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Http\RedirectResponse;

class AdminServiceController extends Controller
{
    function index(Request $request, ?int $id = null): View|RedirectResponse|JsonResponse
    {
        if($id !== null) {
            $element = Service::getServiceById($id);

            if($request->isMethod('PATCH')) {
                return $this->update($request, $element);
            }

            if($request->isMethod('DELETE')) {
                return $this->destroy($element);
            }

            return view('admin.content.detail', [
                'title'      => 'Редактировать услугу',
                'content'    => $element,
                'route'      => 'admin-service',
                'route_back' => 'admin-service',
                'method'     => 'PATCH',
            ]);
        }

        return view('admin.content.index', [
            'title'    => 'Услуги',
            'contents' => Service::getServicesPaginate(false, 5),
            'route'    => 'admin-service',
        ]);
    }

    function store(Request $request)
    {

    }

    function update(Request $request, Service $service): RedirectResponse
    {
        try {
            // Обновляем только переданные поля
            $file = $request->file('uploadFile');

            if($request->hasFile('uploadFile')) {
                $fileName = md5(rand(1, 100) . ':' . $file->getFilename()) . '.' . $file->getClientOriginalExtension();

                Storage::disk('public')->put($fileName, file_get_contents($file->getRealPath()));
            }

            $updated = $service->update([
                'active'        => $request->get('active') != '0',
                'name'          => $request->get('name') ?? '',
                'description'   => $request->get('description') ?? '',
                'price'         => $request->get('price') ?? 0,
                'filepath'      => isset($fileName) ? Storage::disk('public')->url($fileName) : '',
            ]);

            if (!$updated) {
                throw new \Exception('Failed to update service');
            }

            return redirect()->back()
                ->with('success', 'Элемент успешно обновлен');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Не удалось обновить элемент'])
                ->withInput();
        }
    }

    function destroy(Service $service): JsonResponse
    {
        $idDelete = $service->delete();

        if($idDelete) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Delete success',
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 500,
            'errors' => 'Can`t delete service',
        ]);
    }
}
