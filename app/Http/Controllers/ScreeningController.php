<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingAttribute;
use App\Services\NaiveBayesService;
use App\Models\Screening;
use App\Models\ScreeningAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScreeningController extends Controller
{
    protected $nbService;

    public function __construct(NaiveBayesService $nbService)
    {
        $this->nbService = $nbService;
    }

    public function create()
    {
        $attributes = TrainingAttribute::where('is_active', true)->get();
        return view('screening.form', compact('attributes'));
    }

    public function store(Request $request)
    {
        // Validation
        $rules = [];
        $attributes = TrainingAttribute::where('is_active', true)->get();
        foreach ($attributes as $attr) {
            $rules[$attr->name] = 'required|string';
        }
        $validatedData = $request->validate($rules);

        // Perform Naive Bayes Prediction
        try {
            $prediction = $this->nbService->predict($validatedData);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        // Save to Database (Mocking Auth User ID to 1 if not logged in for testing purposes)
        $userId = auth()->id(); 
        
        $screening = new Screening();
        if ($userId) $screening->user_id = $userId;
        else $screening->user_id = \App\Models\User::firstOrCreate(['email'=>'guest@example.com'], ['name'=>'Guest', 'password'=>bcrypt('password')])->id;
        
        $screening->result_class = $prediction['predicted_class'];
        $screening->risk_percentage = $prediction['risk_percentage'];
        $screening->probability_details = json_encode($prediction['details']);
        // Simplified dominant factors
        $screening->dominant_factors = json_encode(array_slice($validatedData, 0, 3)); 
        $screening->save();

        foreach ($validatedData as $key => $val) {
            ScreeningAnswer::create([
                'screening_id' => $screening->id,
                'attribute' => $key,
                'answer_value' => $val
            ]);
        }

        // Flash to session
        return redirect()->route('screening.result', ['id' => $screening->id])->with('success', 'Analisis Kecerdasan Buatan telah selesai. Berikut adalah hasil prediksi Anda.');
    }

    public function result(Request $request)
    {
        $screening = Screening::findOrFail($request->id);
        
        return view('screening.result', compact('screening'));
    }

    public function downloadPdf($id)
    {
        $screening = Screening::findOrFail($id);
        $answers = ScreeningAnswer::where('screening_id', $id)->get();
        
        // Generate QR code for verification
        $qrCode = base64_encode(QrCode::format('svg')->size(100)->generate(route('screening.result', ['id' => $id])));

        $pdf = Pdf::loadView('pdf.screening', compact('screening', 'answers', 'qrCode'));
        
        return $pdf->download('hasil-skrining-glucowise-'.$id.'.pdf');
    }
}
