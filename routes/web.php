<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/search', [MainController::class, 'search'])->name('search');
    Route::get('/settings',[SettingsController::class,'index'])->name('settingsPage');
    Route::post('/settings/upload', [SettingsController::class, 'uploadPeople'])->name('upload.people');
    Route::get('/settings/export', [SettingsController::class, 'exportPeople'])->name('export.people');
    Route::post('/settings/stock', [SettingsController::class, 'updateStock'])->name('update.stock');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
