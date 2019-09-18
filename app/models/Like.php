<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id','like'];

	public function likeable()
	{
		return $this->morphTo();
	}

}
