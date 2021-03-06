<?php

namespace App\Policies;

use App\models\Reply;
use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Reply $reply) {
    	return $reply->user_id == $user->id;
	}
}
