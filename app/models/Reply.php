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
    public function thread()
    {
    	return $this->belongsTo(Thread::class);
    }
    //functions
	public function isFavorite()
	{
	    return $this->favorites()->where('user_id',auth()->id())->exists();
	}

	public function getFavoritesCountAttribute()
	{
	    return $this->favorites()->count();
	}

	public function getIsFavoritedAttribute()
	{
	    return $this->isFavorite();
	}

	public function path()
	{
	    return $this->thread->path()."#reply-{$this->id}";
	}
}
