<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\MedicineTypes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MedicineTypesController extends Controller
{
    public function fetch(): JsonResponse
    {

        return response()->json(['types' => MedicineTypes::all()->toArray()]);
    }
}
