<?php

namespace App\Models;

use App\models\Group;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}
