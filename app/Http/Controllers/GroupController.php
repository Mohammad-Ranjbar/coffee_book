<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupListRequest;
use App\models\Book;
use App\models\Group;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
	public function show(Group $group)
	{

		$lists = $group->get();
		return view('list',compact('lists'));
	}
	public function listOfBook(Group $group)
	{
		$article = Book::with('tagged')->first();
		$lists = $group->books;

		return view('list-book', compact('lists' , 'group','article'));
	}

	public function store(Group $group,GroupListRequest $request)
	{
	    $group->create([
				'name' => $request->name,
		         'description' => $request->description
	    ]);
	    return back()->with('alert','دسته مورد نظر با موفقیت اضافه شد');
	}
}
