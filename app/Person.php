<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Person extends Model
{
    protected $table = 'persons';
    use Searchable;
}
