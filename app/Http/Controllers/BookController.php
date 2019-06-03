<?php

namespace App\Http\Controllers;

use App\models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addBookFromGroup(Request $request,$group)
    {
        $book = new Book;
        $book->create([
        	'name' => $request->name,
	        'author' => $request->author,
	        'ISBN' => $request->ISBN,
	        'publication' => $request->publication,
	        'description' => $request->description,
	        'group_id' => $group
        ]);
        return redirect()->back();
    }
}
