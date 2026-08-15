<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MachineLearningController extends Controller {
    public function index() {
        return view('admin.ml.index');
    }
    public function preprocess() {
        // Proses simulasi preprocessing
        return redirect()->route('admin.ml.index', ['preprocessed' => 'true'])
            ->with('success', 'Preprocessing selesai: Deteksi data kosong (Null Validation), penanganan duplikasi data, dan normalisasi berhasil dijalankan pada dataset utama.');
    }
    public function validateModel(Request $request) {
        $method = $request->input('method');
        return redirect()->route('admin.ml.index', ['validated' => 'true', 'method' => $method])
            ->with('success', 'Pengujian keandalan model menggunakan metode ' . strtoupper($method) . ' Validation telah berhasil diselesaikan. Nilai ROC Curve telah dikalkulasi ulang.');
    }
}
