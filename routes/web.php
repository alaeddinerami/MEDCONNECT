<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorpatientController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\MedicineController;
use App\Models\Appointement;
use App\Models\Appointment;
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

///////////

Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::put('/medicines/{medicine}', [MedicineController::class, 'update'])->name('medicines.update');
Route::delete('/medicines/{medicine}', [MedicineController::class, 'destroy'])->name('medicines.destroy');

Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/appointement', [DoctorController::class, 'appointementDoctor'])->name('doctor.appointement');
Route::post('doctor', [DoctorController::class, 'store'])->name('doctor.store');
Route::put('doctor/{medicine}', [DoctorController::class, 'update'])->name('doctor.update');
Route::delete('doctor/{medicine}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

route::get('/patient/index/appointements/{doctor}', [AppointmentController::class,'index'])->name('appointements.index');
route::get('appointements', [AppointmentController::class,'store'])->name('appointements.store');
Route::get('/patient', [SpecialiteController::class, 'specialtyPatient'])->name('specialtyPatient.index');
route::put('/patient/index/appointements', [AppointmentController::class,'update'])->name('appointements.update');
Route::get('/patient/explore/{specialite}', [PatientController::class, 'explore'])->name('patient.explore');
// Route::get('/patient/{doctor}', [PatientController::class, 'show'])->name('doctor.show');


Route::post('/patient/store', [ReviewController::class, 'store'])->name('review.store');
Route::get('/patient/{doctor}', [ReviewController::class, 'show'])->name('doctor.show');


Route::get('/favorites', [DoctorpatientController::class, 'show'])->name('favorites.show');
Route::post('/favorites/add', [DoctorpatientController::class, 'store'])->name('favorites.add');
Route::post('/favorites/remove', [DoctorPatientController::class, 'removeFromFavorites'])->name('favorites.remove');


Route::get('/certificat', [CertificatController::class, 'index'])->name('certificat.show');
Route::get('/certificat/{appointment}', [CertificatController::class, 'edit'])->name('certificat.edit');
Route::get('/print/{certificat}', [CertificatController::class, 'show'])->name('showcertificate');
Route::post('/certificat', [CertificatController::class, 'store'])->name('certificat.store');

 
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
    Route::post('/custom-logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

    // Route::get('/doctor/appointements', function () {
    //     if (auth()->user()->role === 'doctor') {
    //         $appointements = Appointment::with('patient')->get();
    //         return view('doctor.appointements', compact('appointements'));
    //     }
    //     return redirect('/');
    // })->name('doctor.appointements');

   
    // Route::get('/patient/index', function () {
    //     if (auth()->user()->role === 'patient') {
    //         return view('patient.index'); 
    //     }
    //     return redirect('/');
    // })->name('patient.index');

    // Route::get('/doctor/index', function () {
    //     if (auth()->user()->role === 'doctor') {
    //         return view('doctor.index'); 
    //     }
    //     return redirect('/');
    // })->name('doctor.index');
});

require __DIR__.'/auth.php';