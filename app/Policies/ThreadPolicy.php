<?php

namespace App\Policies;

use App\models\User;
use App\models\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the thread.
     *
     * @param  \App\models\User  $user
     * @param  \App\models\Thread  $thread
     * @return mixed
     */
    public function view(User $user, Thread $thread)
    {
        //
    }

    /**
     * Determine whether the user can create threads.
     *
     * @param  \App\models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

	public function update(User $user, Thread $thread)
	{
		return $thread->user_id == $user->id;
	}

    /**
     * Determine whether the user can delete the thread.
     *
     * @param  \App\models\User  $user
     * @param  \App\models\Thread  $thread
     * @return mixed
     */
    public function delete(User $user, Thread $thread)
    {
        //
    }
}
