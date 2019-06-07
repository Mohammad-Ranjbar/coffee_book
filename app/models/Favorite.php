<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function favorites()
    {
        return $this->morphTo();
    }
}
