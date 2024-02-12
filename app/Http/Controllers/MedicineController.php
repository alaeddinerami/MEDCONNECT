<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $medicines = Medicine::all();
        return view('medicines.medicines', compact('medicines'));
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
            

        ]);

        Medicine::create($validatedData);

        return redirect()->back()->with('addsuccess', 'Medicine created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
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
    public function destroy(Medicine $medicine)
    {
        $medicine->Delete();

        return redirect()->back()->with('success', 'Medicine deleted successfully!');

    }
}
