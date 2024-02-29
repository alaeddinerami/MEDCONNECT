<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctorID' => ['required', 'integer'],
            'patientID' => ['required', 'integer'],
            'starCount' => ['required', 'integer'],
            'comment' => ['required', 'string'],
        ]);
        
        $newReview = Review::create([
            'doctorID' => $validatedData['doctorID'],
            'patientID' => $validatedData['patientID'],
            'starCount' => $validatedData['starCount'],
            'comment' => $validatedData['comment'],
        ]);
        // dd($newReview);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor, Patient $patient)
    {
        //
        // $reviews = Review::all();
        $patient = Patient::where('userID', Auth::id())->first();
        $reviews = Doctor::find( $doctor->id)->review;
        $averageStars = $reviews->avg('starCount');
        // dd($averageStars);
        return view('patient.rating', compact('reviews','patient','doctor', 'averageStars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
