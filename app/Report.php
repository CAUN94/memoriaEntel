<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Report extends Model
{
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

    // public function Manager()
    // {
    	
    // 	 return $this->belongsTo(User::class);
    // }

}
