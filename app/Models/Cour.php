<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{

    function cours_seance(){
return $this->hasMany(Seance::class,'cours_id' );
    }

    function cours_et(){
return $this->belongsToMany(Etudiant::class, 'cours_etudiants','cours_id', 'etudiant_id');
}


    function cours(){
return $this->belongsToMany(User::class, 'cours_users','cours_id', 'user_id');
}
    use HasFactory;
}
