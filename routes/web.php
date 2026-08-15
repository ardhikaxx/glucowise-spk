<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/screening', [App\Http\Controllers\ScreeningController::class, 'create'])->name('screening.form');
    Route::post('/screening', [App\Http\Controllers\ScreeningController::class, 'store'])->name('screening.store');
    Route::get('/screening/result/{id}', [App\Http\Controllers\ScreeningController::class, 'result'])->name('screening.result');
    Route::get('/screening/pdf/{id}', [App\Http\Controllers\ScreeningController::class, 'downloadPdf'])->name('screening.pdf');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/training-data', [App\Http\Controllers\TrainingDataController::class, 'index'])->name('training.index');
    Route::post('/training-data/train', [App\Http\Controllers\TrainingDataController::class, 'train'])->name('training.train');
    Route::get('/training-data/export', [App\Http\Controllers\TrainingDataController::class, 'export'])->name('training.export');
    
    // Users & Roles
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [App\Http\Controllers\UserController::class, 'updateRole'])->name('users.updateRole');
    
    // Articles
    Route::resource('articles', App\Http\Controllers\EducationalArticleController::class)->except(['show']);

    // Audit Logs
    Route::get('/audit-logs', [App\Http\Controllers\AuditLogController::class, 'index'])->name('audit_logs.index');
    
    // Settings, FAQ, Contact
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
    
    // ML Preprocessing & Validation
    Route::get('/ml-lab', [App\Http\Controllers\MachineLearningController::class, 'index'])->name('ml.index');
    Route::post('/ml-lab/preprocess', [App\Http\Controllers\MachineLearningController::class, 'preprocess'])->name('ml.preprocess');
    Route::post('/ml-lab/validate', [App\Http\Controllers\MachineLearningController::class, 'validateModel'])->name('ml.validate');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Manual Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');
