<?php

namespace App\Http\Controllers;

use App\models\Book;
use App\models\Group;
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
		$file = new File();
		if ($request->hasFile('image')) {
			$image    = $request->file('image');
			$fileName = time() . '.' . $image->getClientOriginalExtension();
			$filePath = '/uploads/Books/' . $request->name . '/';
			$Path     = public_path('/uploads/Books/') . $request->name . '/';
			$file->makeDirectory($Path, $mode = 0777, true, true);
			Image::make($image)->insert(public_path('/uploads/Books/logo.png'), 'bottom-right', 10, 10)->resize(300, 300)
			     ->save($Path . $fileName);

			$book->name         = $request->name;
			$book->author       = $request->author;
			$book->ISBN         = $request->ISBN;
			$book->publication  = $request->publication;
			$book->description  = $request->description;
			$book->group_id     = $group;
			$book->imageAddress = $filePath;
			$book->imageName    = $fileName;
			$book->save();
		} else {
			$book->create([
				'name'        => $request->name,
				'author'      => $request->author,
				'ISBN'        => $request->ISBN,
				'publication' => $request->publication,
				'description' => $request->description,
				'group_id'    => $group,

			]);
		}

		return back();
	}

	public function showBookFromGroup(Group $group, $book)
	{
		$book = Book::find($book);


		return view('showBook', compact('book', 'group'));
	}
}
