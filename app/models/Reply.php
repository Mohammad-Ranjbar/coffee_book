<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use RecordsActivity;

    protected $guarded = [];
    protected $appends = ['favoritesCount' , 'isFavorited'];

    //relation
	public function owner()
	{
	    return $this->belongsTo(User::class,'user_id');
	}
    public function favorites()
    {
        return $this->morphMany('App\models\Favorite', 'favorite')
    }
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    public function unFavorite()
    {
	    $attributes = ['user_id' => auth()->id()];
		$this->favorites()->get()->each->delete();

    }


}
