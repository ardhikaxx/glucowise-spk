<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SettingsController extends Controller {
    public function index() {
        return view('admin.settings.index');
    }
    public function update(Request $request) {
        return back()->with('success', 'Pengaturan sistem, FAQ, dan informasi Kontak berhasil diperbarui.');
    }
}
