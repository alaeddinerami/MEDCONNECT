<?php

namespace App\Http\Controllers;

use App\Models\Appointement;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Doctor $doctor)
    {
        //
        $appointements = Doctor::find($doctor->id)->appointement;
        // dd($appointements);
        return view("patient.appointements", compact("appointements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $doctorID)
    {
        //
        $bookingHours = [
            '8:00 AM',
            '9:00 AM',
            '10:00 AM',
            '11:00 AM',
            '2:00 PM',
            '3:00 PM',
            '4:00 PM',
            '5:00 PM',
        ];

        $appointement = new Appointement();

        foreach ($bookingHours as $time) {
            $appointement->create([
                'bookingHour' => $time,
                'date' => now(),
                'doctorID' => $doctorID,
                'status' => 0,
            ]);
        }
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointement $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointement $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointement $appointment)
    {
        //
        // dd($request);
        $validatedData = $request->validate([
            'appointementID' => ['required', 'integer'],
            'patientID' => ['required', 'integer'],
        ]);

        $appointement = Appointement::findOrFail($validatedData['appointementID']);

        $appointement->update([
            'patientID' => $validatedData['patientID'],
            'status' => 1,
        ]);


        return redirect()->back()->with('success', 'Appointement Booked!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointement $appointment)
    {
        //
    }
}