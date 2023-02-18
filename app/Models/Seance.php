<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    public $timestamps = false;
    use HasFactory;

    function seances(){
return $this->belongsToMany(Etudiant::class, 'presences','seance_id','etudiant_id');
    }

    function seances_cours(){
return $this->belongsToMany(Cour::class,'cours_id');
    }
}
