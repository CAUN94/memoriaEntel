<?php
// Modelo de reporte, tiene toda la info y lo que se guarda en la bd además de pueden crear consulta en base a esto
namespace App;

use Illuminate\Database\Eloquent\Model;



class Report extends Model
{
	// datos que se pueden modificar
	protected $fillable = 
	['user_id',
	'Cockpit',
	'Market',
	'FGI',
	'FGE',
	'Horizontes',
	'Proyects',
	'Activities',
	'Innovation_Categories',
	'Priority',
	'Finish_at',
	'Responsable',
	'Leadership',
	'Rol',
	'comments',
	'Progress',
	'Status'
	];

  

}
