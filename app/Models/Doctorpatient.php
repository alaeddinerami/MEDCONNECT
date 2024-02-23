<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorpatient extends Model
{
    use HasFactory;
    protected $fillable=["patientID" ,"doctorID"];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorID');
    }

    public function patient()
    {
        return $this->belongsTo(patient::class, 'patientID');
    }

}
