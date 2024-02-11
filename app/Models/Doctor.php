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
}
