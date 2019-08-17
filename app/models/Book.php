<?php

namespace App\models;

use App\models\Group;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['name','group_id','author','ISBN','description','publication','image'];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
