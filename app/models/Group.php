<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = ['name' , 'description' ,'book_id'];
	public function books()
	{
	    return $this->hasMany(Book::class);
	}
}
