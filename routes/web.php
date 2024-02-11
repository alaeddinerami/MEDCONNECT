<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/specialties/create', [SpecialiteController::class, 'create'])->name('specialties.create');
Route::get('/specialties/create/index', [SpecialiteController::class, 'index'])->name('specialties.index');
Route::post('/specialties/store', [SpecialiteController::class, 'store'])->name('specialties.store');
Route::delete('/specialties/{specialite}', [SpecialiteController::class, 'destroy'])->name('specialties.destroy');
Route::put('/specialties/update/{specialite}', [SpecialiteController::class, 'update'])->name('specialties.update');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/patient/index', function () {
        if (auth()->user()->role === 'patient') {
            return view('patient.index'); 
        }
        return redirect('/');
    })->name('patient.index');

    Route::get('/doctor/index', function () {
        if (auth()->user()->role === 'doctor') {
            return view('doctor.index'); 
        }
        return redirect('/');
    })->name('doctor.index');
});

require __DIR__.'/auth.php';