<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\Sales;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SalesController extends Controller
{
    public function fetch(): JsonResponse
    {
        return response()->json(['sales' => Sales::all()->toArray()]);
    }

    /**
     * @throws ValidationException
     */
    public function add(Request $request): JsonResponse
    {
        $this->validate($request, [
            'patient_name' => 'required|string|min:2|max:100',
        ]);
        foreach ($request->input('selected') as $med) {
            $drug = Medicines::where('id', $med)->first();
            $drug->sales()->create([
                'patient_name' => $request->input('patient_name'),
                'staff_id' => Auth::id(),
                'bill_payment' => $drug->price
            ]);
        }
        return response()->json(['sales' => Sales::all()->toArray()]);
    }
}
