<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Doctorpatient;
use App\Models\Patient;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorpatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
    }

    // public function addFavoriteDoctor(Request $request)
    // {
    //     $patient = Patient::findOrFail($request->patient_id);
    //     $doctor = Doctor::findOrFail($request->doctor_id);
        
    //     $patient->doctors()->attach($doctor);

    //     return view('patient.rating')->with('success', 'Doctor added to favorites successfully!');
    // }

    // public function removeFavoriteDoctor(Request $request)
    // {
    //     $patient = Patient::findOrFail($request->patient_id);
    //     $doctor = Doctor::findOrFail($request->doctor_id);
        
    //     $patient->doctors()->detach($doctor);

    //     return redirect()->back()->with('success', 'Doctor removed from favorites successfully!');
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validatedData = $request->validate([
            'doctorID' => 'required',
            'patientID' => 'required',
            
        ]);
        
        $newReview = Doctorpatient::create( $validatedData);
        // dd($newReview);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctorpatient $doctorpatient, Specialite $Specialite)
    {
        //
        
            // Retrieve the list of doctors associated with the Doctorpatient
            // $doctors = $doctorpatient->doctors()->get();
    
            // You can eager load additional relationships if needed
            $patient=Patient::where('userID',  Auth::user()->id)->first();
            
            $doctors = Doctorpatient::with("doctor","doctor.user")->where("patientID",$patient->id)->get();
            
      
            // Debug to verify the retrieved data
            // dd($doctorpatient);
    
            // Return the view with the list of doctors
            return view('patient.favorite', compact('doctors'));
        
        // return view("patient.favorite");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctorpatient $doctorpatient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctorpatient $doctorpatient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctorpatient $doctorpatient)
    {
        //
    }
}
