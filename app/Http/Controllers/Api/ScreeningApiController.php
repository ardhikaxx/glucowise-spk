<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingAttribute;
use App\Services\NaiveBayesService;

class ScreeningApiController extends Controller
{
    protected $nbService;

    public function __construct(NaiveBayesService $nbService)
    {
        $this->nbService = $nbService;
    }

    public function getAttributes()
    {
        $attributes = TrainingAttribute::where('is_active', true)->get();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil atribut skrining',
            'data' => $attributes
        ]);
    }

    public function predict(Request $request)
    {
        // simplistic validation
        $rules = [];
        $attributes = TrainingAttribute::where('is_active', true)->get();
        foreach ($attributes as $attr) {
            $rules[$attr->name] = 'required|string';
        }
        $validatedData = $request->validate($rules);

        try {
            $prediction = $this->nbService->predict($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Prediksi berhasil',
                'data' => $prediction
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
