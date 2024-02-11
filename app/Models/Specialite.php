<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    protected $fillable = ['namespecialite'];
    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'idspecialite');
    }
}
