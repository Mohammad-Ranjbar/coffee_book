<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	// Relations

	public function threads()
	{
		return $this->hasMany(Thread::class)->latest();
	}

	public function activity()
	{
		return $this->hasMany(Activity::class);
	}


	// Functions
	public function getRouteKeyName()
	{
		return 'name'; // username
	}
}
