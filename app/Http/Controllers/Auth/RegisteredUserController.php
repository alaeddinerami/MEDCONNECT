<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Medecin;
use App\Models\Specialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $Specialites = Specialite::all();
        return view('auth.register', compact('Specialites'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validatedData = $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:doctor,patient'],
            'specialty' => ['required_if:role,doctor', 'exists:specialites,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($validatedData['role'] === 'doctor') {
            if (isset($validatedData['specialty'])) {
                $doctor = Doctor::create([
                    'iduser' => $user->id,
                    'idspecialite' => $validatedData['specialty']
                ]);
                $newAppointements = new AppointmentController();
                $newAppointements->store($doctor->id);
                
            }
             else {
                return back()->withInput()->withErrors(['spetiality' => 'Please choose your Sptiality .']);
            }

        }
        if ($validatedData['role'] === 'patient') {
            $user->patient()->create([
                'userID' => $user->id
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return $request->role == 'doctor' ? redirect('/doctor') : redirect('/patient');
    }
}