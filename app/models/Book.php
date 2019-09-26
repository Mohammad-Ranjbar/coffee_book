<?php

namespace App\models;

use App\models\Group;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

	protected $fillable = ['name','group_id','user_id','author','ISBN','description','publication','imageName','imageAddress'];
	protected $appends = ['active'];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function likes()
	{
		return $this->morphMany('App\models\Like', 'likeable');
	}

	public function comments()
	{
	    return $this->hasMany('App\models\Comment');
	}

	public function getActiveAttribute()
	{
		$like = $this->likes()->where('user_id', auth()->user()->id)->first();
		if (isset($like->id)) {
			return $like->like;
		}
		else
			return 0;
	}
}
