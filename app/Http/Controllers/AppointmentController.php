<?php

namespace App\Http\Controllers;

use App\Models\Appointement;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $appointements = Appointement::all();
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
    public function store(Request $request)
    {
        //
        
    
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
