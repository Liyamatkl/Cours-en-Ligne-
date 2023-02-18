<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{

    use HasFactory;

    function etudiants(){
return $this->belongsToMany(Cour::class, 'cours_etudiants', 'etudiant_id', 'cours_id');
}

function etudiants_sea(){
return $this->belongsToMany(Seance::class,'presences','etudiant_id','seance_id');

    }

        



}
