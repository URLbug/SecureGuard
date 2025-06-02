<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Http\RedirectResponse;

class AdminNewsController extends Controller
{
    function index(Request $request, ?int $id = null): View|RedirectResponse|JsonResponse
    {
        if($id !== null) {
            $element = News::getNewsById($id);

            if($request->isMethod('PATCH')) {
                return $this->update($request, $element);
            }

            if($request->isMethod('DELETE')) {
                return $this->destroy($element);
            }

            return view('admin.content.detail', [
                'title'      => 'Редактировать услугу',
                'content'    => $element,
                'route'      => 'admin-news',
                'route_back' => 'admin-news',
                'method'     => 'PATCH',
            ]);
        }

        return view('admin.content.index', [
            'title'    => 'Услуги',
            'contents' => News::getNewssPaginate(false, 5),
            'route'    => 'admin-news',
        ]);
    }

    function store(Request $request)
    {

    }

    function update(Request $request, News $News): RedirectResponse
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

            $updated = $News->update([
                'active'        => $request->get('active') != '0',
                'name'          => $request->get('name') ?? '',
                'description'   => $request->get('description') ?? '',
                'price'         => $request->get('price') ?? 0,
                'filepath'      => $fileName,
            ]);

            if (!$updated) {
                throw new \Exception('Failed to update News');
            }

            return redirect()->back()
                ->with('success', 'Элемент успешно обновлен');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Не удалось обновить элемент'])
                ->withInput();
        }
    }

    function destroy(News $News): JsonResponse
    {
        $idDelete = $News->delete();

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
            'errors' => 'Can`t delete News',
        ]);
    }
}
