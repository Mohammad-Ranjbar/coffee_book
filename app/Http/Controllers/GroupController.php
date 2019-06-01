<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupListRequest;
use App\models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
	public function show(Group $group)
	{
		$lists = $group->get();
		return view('list',compact('lists'));
	}

	public function store(Group $group,GroupListRequest $request)
	{
	    $group->create([
				'name' => $request->name,
		         'description' => $request->description
	    ]);
	    return redirect()->back();
	}
}
