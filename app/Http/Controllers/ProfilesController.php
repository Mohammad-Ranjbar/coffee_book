<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	public function show(User $user)
	{
		$activities = $user->activity()->with('subject')->get();

		return view('Forum.Profiles.show')->with([
			'profile_user' => $user,
			'threads'      => $user->threads()->paginate(10),
			'activities'   => $activities,
		]);
	}
}
