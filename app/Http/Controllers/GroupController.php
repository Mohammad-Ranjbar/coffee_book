<?php

namespace App\Http\Controllers;

use App\models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
	public function show(Group $group)
	{
		return $group->get();
	}
}
