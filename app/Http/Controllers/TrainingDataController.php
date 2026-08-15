<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingData;
use Yajra\DataTables\Facades\DataTables;
use App\Jobs\TrainModelJob;

class TrainingDataController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TrainingData::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        
        return view('admin.training_data.index');
    }

    public function train()
    {
        TrainModelJob::dispatch(auth()->id());
        return back()->with('success', 'Proses training Naive Bayes (Laplace Smoothing) sedang berjalan secara asinkron di background (Queue).');
    }
    
    public function export()
    {
        // Mock export logic for brevity
        return back()->with('success', 'File Excel dataset berhasil digenerate.');
    }
}
