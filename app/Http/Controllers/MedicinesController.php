<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MedicinesController extends Controller
{
    public function fetch(): JsonResponse
    {
        return response()->json(['medicines' => Medicines::all()->toArray()]);
    }

    /**
     * @throws ValidationException
     */
    public function add(Request $request): JsonResponse
    {
        $this->validator($request->all())->validate();
        $medicine = Medicines::create($request->all());
        return response()->json(['medicine' => $medicine]);

    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id): JsonResponse
    {
        dd($request->all());
        $this->validator($request->all())->validate();
        $medicine = Medicines::where('id', $id)->update($request->all());
        return response()->json('medicine', $medicine);
    }


    private function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|max:50',
            'generic_name' => 'nullable|string',
            'categories' => 'required|string',
            'prescription' => 'nullable|string|max:500',
            'shelf_no' => 'required|string',
            'dose_amount' => 'required|string',
            'type_id' => 'required|integer',
            'no_items' => 'required|integer|min:0',
            'price' => 'required|integer|min:5',
            'manufacture_date' => 'required|date',
            'med_company' => 'required|string',
            'exp_date' => 'required|date',
        ]);
    }
}
