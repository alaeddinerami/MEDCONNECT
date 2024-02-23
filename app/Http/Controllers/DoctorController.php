<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Traits\ImageUpload;
use App\Models\Specialite;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        $appointements = Appointement::all();
        $specialties = Specialite::all();
        $medicines = Medicine::with('Image')->get();
        // dd($specialties);
        return view('doctor.index', compact('medicines','specialties','appointements'));
    }
    public function appointementDoctor()
    {
        
        
        $appointements = Appointement::all();
        // dd($appointements);
        $specialties = Specialite::all();
        $medicines = Medicine::with('Image')->get();
        // dd($specialties);
        return view('doctor.appointements', compact('medicines','specialties','appointements'));
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
        
        $validatedData = $request->validate([
            'namemedicine' => 'required',
            'description' => 'required',
            'speciality' => 'required',
            

        ]);


        $medicine = Medicine::create(array_merge($validatedData, ['speciality_id' => $validatedData['speciality']]));

        $this->storeImg($request->file('image'), $medicine);

        return redirect()->back()->with('addsuccess', 'Medicine created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'editNamemedicine' => 'required',
            'editDescription' => 'required',
        ]);

        $item = Medicine::find($id);
        $item->namemedicine = $request->input('editNamemedicine');
        $item->description = $request->input('editDescription');

        $item->save();

        // $medicine->update($validatedData);
        return redirect()->back()->with('success', 'Medicine updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor, Medicine $medicine)
    {
        //
        $medicine->Delete();

        return redirect()->back()->with('success', 'Medicine deleted successfully!');
    }
}
