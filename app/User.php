<?php
// Modelo del user tiene toda la info de la bd y además se le pueden hacer consultas
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','admin' // Datos que se pueden modificar
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', //datos que no se pueden ver
    ];


       public function Reports()
    {
         return $this->hasMany(Report::class); // Consulta para ver todos los reportes del respectivo usuaio
    }
}
