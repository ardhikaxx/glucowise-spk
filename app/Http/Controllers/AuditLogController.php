<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// We'll query DB directly since AuditLog model wasn't explicitly scaffolded to save time
use Illuminate\Support\Facades\DB; 

class AuditLogController extends Controller
{
    public function index()
    {
        // Using DB facade to fetch mock/real logs
        $logs = DB::table('model_training_logs')->latest()->paginate(10);
        return view('admin.audit_logs.index', compact('logs'));
    }
}
