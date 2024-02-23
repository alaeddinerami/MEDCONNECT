<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Appointement;
use App\Models\Certificat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificats = Certificat::where('patient_id', Auth::user()->patient->first()->id)->get();
        return view("patient.certificat", compact("certificats"));
    
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
        // dd($request->all());
        $validatedData = $request->validate([
            'nomberjr' => 'required | integer',
            'date_consultation' => 'required',
            'patient_id'=> 'required',
        ]);

        Certificat::create([
            'patient_id' => $request->patient_id,
            'nomberjr' => $request->nomberjr,
            'date_consultation' => $request->date_consultation,
            'medecin_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($certificat)
    {
        //
            $patientId = Auth::user()->patient->first()->id;
            $print = Certificat::where('patient_id', $patientId)
                ->where('id', $certificat)
                ->get();
    
            // dd($print);
            $pdf=PDF::loadView('patient.certificatprint',compact('print'));
            return $pdf->download('Certaficat.pdf');
            // return view('patient.showCertafica
        
        // return view('patient.certificatprint', compact('print'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $appointemet)
    {
        //
        $app = Appointement::where("id", $appointemet)->get();
        // dd($app);
        return view("doctor.certificat", compact("app"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificat $certificat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificat $certificat)
    {
        //
    }
}
