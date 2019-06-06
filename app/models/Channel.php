<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
	//Relations

	//Functions
	public function getRouteKeyName()
	{
	    return 'slug';
	}
}
