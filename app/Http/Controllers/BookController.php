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
		$book     = new Book;
		$image    = $request->file('image');
		$filename = time() . '.' . $image->getClientOriginalExtension();
		$path     = public_path() . '/uploads/' . $request->name . '/';
		$file     = new File();
		$file->makeDirectory($path, $mode = 0777, true, true);
		Image::make($image)->resize(300, 300)->save($path . $filename);
		$book->create([
			'name'        => $request->name,
			'author'      => $request->author,
			'ISBN'        => $request->ISBN,
			'publication' => $request->publication,
			'description' => $request->description,
			'group_id'    => $group,
			'image'       => $filename,
		]);

		return back();
	}

	public function showBookFromGroup($book, $group)
	{
		$name = str_replace('_', ' ', $book);
		$find = Book::where('name', '=', $name)->first();
		dd($find->name);
	}
}
