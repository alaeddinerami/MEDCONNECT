<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialite::all();
      
        return view('specialties.create', compact('specialties'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'namespecialite' => 'required',
        ]);

        $result = Specialite::create([
            'namespecialite' => $request->input('namespecialite')
        ]);
        // dd($result);
        return redirect()->route('specialties.index')->with('addsuccess','adding successfully');;

    }

    /**
     * Display the specified resource.
     */
    public function show(Specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Specialite $specialite)
    {
        //
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialite $specialite)
    {
        //
        $request->validate([
            'editName' => 'required',
        ]);
    
        $specialite->update([
            'namespecialite' => $request->input('editName')
        ]);
    
        return redirect()->route('specialties.index')->with('success', 'Specialty updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialite $specialite)
    {
        //
        $specialite->delete();

        return redirect()->route('specialties.index')->with('success','deleted successfully');
    }
}
