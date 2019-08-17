<?php

namespace App\Http\Controllers;

use App\models\Book;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Http\Request;
use Image;


class BookController extends Controller
{
	/**
	 * @param \Illuminate\Http\Request $request
	 * @param $group
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function addBookFromGroup(Request $request, $group)
	{

		$book = new Book;
		if ($request->hasFile('image')) {
			$image    = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path().'/uploads/'.$request->name.'/';
			$file = new File();
			$file->makeDirectory($path, $mode = 0777, true, true);
			// dd($path);
			Image::make($image)->resize(300, 300)->save($path.$filename);
			$book->image = $filename;
		}

		$book->create([
			'name'        => $request->name,
			'author'      => $request->author,
			'ISBN'        => $request->ISBN,
			'publication' => $request->publication,
			'description' => $request->description,
			'group_id'    => $group,
		]);

		return back();
	}
}
