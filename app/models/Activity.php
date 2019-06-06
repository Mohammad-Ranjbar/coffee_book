<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function subject()
    {
        return $this->morphTo();
    }
}
