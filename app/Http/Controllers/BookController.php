<?php

namespace App\Http\Controllers;

use App\models\Book;
use App\models\Group;
use App\models\User;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use UxWeb\SweetAlert\SweetAlert;

class BookController extends Controller
{
	/**
	 * @param \Illuminate\Http\Request $request
	 * @param $group
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function addBookFromGroup(Request $request, $group, $user)
	{
		$book              = new Book;
		$file              = new File();
		$book->name        = $request->name;
		$book->author      = $request->author;
		$book->ISBN        = $request->ISBN;
		$book->publication = $request->publication;
		$book->description = $request->description;
		$book->group_id    = $group;
		if ($request->hasFile('image')) {
			$image    = $request->file('image');
			$fileName = '/uploads/Books/' . $request->name . '/' . time() . '.' . $image->getClientOriginalExtension();
			$Path     = public_path('/uploads/Books/') . $request->name . '/';
			$file->makeDirectory($Path, $mode = 0777, true, true);
			Image::make($image)->insert(public_path('/uploads/Books/logo.png'), 'bottom-right', 1, 1)->resize(400, 400)
			     ->save(public_path($fileName));
			$book->image = $fileName;
		}
		$book->user_id = $user;
		$book->save();

		return back()->with('alert', 'کتاب مورد نظر با موفقیت اضافه شد');
	}

	public function showBookFromGroup(Group $group, $book)
	{

		$book = Book::find($book);

		return view('showBook', compact('book', 'group'));
	}

	public function updateBook($id, Request $request)
	{
		Book::find($id)->update([
			'name'        => $request->name,
			'author'      => $request->author,
			'publication' => $request->publication,
			'ISBN'        => $request->ISBN,
			'description' => $request->description,

		]);

		return back();
	}

	public function deleteBook($id)
	{
		Book::find($id)->delete();

		return back();
	}

	public function voted($id, $vote)
	{
		$book  = Book::find($id);
		$voted = $book->likes()->where('user_id', auth()->user()->id)->first();
		if (isset($voted->id)) {
			$voted->update(['like' => $vote]);
		} else
			$book->likes()->create(['user_id' => auth()->user()->id, 'like' => $vote]);

		return back();
	}

	public function home()
	{
		$newsbooks = Book::orderBy('created_at', 'desc')->paginate(6);

		$pops = Book::withCount('likes')->orderByDesc('likes_count')->take(6)->get();

		return view('welcome', compact('newsbooks', 'pops'));
	}

	public function noVote($id)
	{
		$book = Book::find($id);
		$book->likes()->where('user_id', auth()->user()->id)->delete();

		return back();
	}


}
