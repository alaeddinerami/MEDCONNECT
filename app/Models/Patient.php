<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userID');
    }

    public function appointement(){
        return $this->hasOne(Appointement::class, 'patientID');
    }

    public function review(){
        return $this->hasOne(Review::class,'patientID');
    }

    public function Doctorpatients()
    {
        return $this->hasMany(Doctorpatient::class, 'patientID');
    }

    public function certificats()
{
    return $this->hasMany(Certificat::class, 'patient_id');
}
}