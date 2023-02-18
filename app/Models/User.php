<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public $timestamps = false;

    protected $hidden = ['mdp'];

    protected $fillable = ['login', 'mdp', 'type'];

    protected $attributes = [
        'type' => 'NULL'
    ];


    public function getAuthPassword(){
        return $this->mdp;
    }

    public function IsAdmin(){
        return $this->type == 'admin';
    }

    public function IsGestionnaire(){
        return $this->type == 'gestionnaire';
    }

    public function IsEnseignant(){
        return $this->type == 'enseignant';
    }

    function users(){
return $this->belongsToMany(Cour::class, 'cours_users', 'user_id', 'cours_id');
}
}
