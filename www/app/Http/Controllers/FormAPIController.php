<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->isMethod('POST')) {
            return response()->json([
                'success' => false,
                'message' => 'Only POST requests are allowed',
            ]);
        }

        return $this->store($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->toArray(),
            ]);
        }

        $isInsert = Form::query()->insert([
            'data' => json_encode([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'message' => $request->get('message'),
            ]),
            'userId' => Auth::check() ? Auth::id() : 1,
        ]);

        if(!$isInsert) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store data',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Form created successfully',
        ]);
    }
}
