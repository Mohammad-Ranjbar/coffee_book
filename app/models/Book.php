<?php

namespace App\models;

use App\models\Group;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['name','group_id','user_id','author','ISBN','description','publication','imageName','imageAddress'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
