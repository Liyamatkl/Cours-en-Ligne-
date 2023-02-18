<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursEtudiant extends Model
{
    use HasFactory;
     protected $table = "cours_etudiants";
    public $timestamps = false;
}
