<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser',
        'idspecialite',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'idspecialite');
    }

    public function appointement()
    {
        return $this->hasMany(Appointement::class, 'doctorID');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'doctorID');
        
    }
    public function doctorpatients()
    {
        return $this->hasMany(doctorpatient::class, 'doctorID');
    }
    public function Certificatmedecin()
    {
        return $this->hasMany(Certificat::class, 'medecin_id');
    }
}
