<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['body', 'post_id',  'user_id'];
	protected $appends = ['active'];
	public function likes()
	{
		return $this->morphMany('App\models\Like', 'likeable');
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
