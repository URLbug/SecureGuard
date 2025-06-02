<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Http\RedirectResponse;

class AdminFormController extends Controller
{
    function index(Request $request, ?int $id = null): View|RedirectResponse|JsonResponse
    {
        if($id !== null) {
            $element = Form::getFormById($id);

            if($request->isMethod('PATCH')) {
                return $this->update($request, $element);
            }

            if($request->isMethod('DELETE')) {
                return $this->destroy($element);
            }

            return view('admin.content.detail', [
                'title'      => 'Редактировать услугу',
                'content'    => $element,
                'route'      => 'admin-form',
                'route_back' => 'admin-form',
                'method'     => 'PATCH',
            ]);
        }

        return view('admin.content.index', [
            'title'    => 'Услуги',
            'contents' => Form::getFormsPaginate(false, 5),
            'route'    => 'admin-form',
        ]);
    }

    function store(Request $request)
    {

    }

    function update(Request $request, Form $form): RedirectResponse
    {
        try {
            $fileName = '';

            if($request->has('filepath')) {
                $fileName = $request->get('filepath');
            }

            $file = $request->file('uploadFile');

            if($request->hasFile('uploadFile')) {
                $fileName = md5(rand(1, 100) . ':' . $file->getFilename()) . '.' . $file->getClientOriginalExtension();

                Storage::disk('public')->put($fileName, file_get_contents($file->getRealPath()));

                $fileName = Storage::disk('public')->url($fileName);
            }

            $updated = $form->update([
                'active'        => $request->get('active') != '0',
                'name'          => $request->get('name') ?? '',
                'description'   => $request->get('description') ?? '',
                'price'         => $request->get('price') ?? 0,
                'filepath'      => $fileName,
            ]);

            if (!$updated) {
                throw new \Exception('Failed to update Form');
            }

            return redirect()->back()
                ->with('success', 'Элемент успешно обновлен');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Не удалось обновить элемент'])
                ->withInput();
        }
    }

    function destroy(Form $form): JsonResponse
    {
        $idDelete = $form->delete();

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
            'errors' => 'Can`t delete Form',
        ]);
    }
}
