<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\City;
use App\Genre;

class IndexController extends Controller
{
    public function index()
    {
    	$books = Book::orderBy('created_at', 'desc')->get();

    	return view('index', ['books' => $books]);
    }

    public function book($slug)
    {
    	$data = Book::with('user')->where('slug', $slug)->get();
    	$cities = City::all();
    	// $user = $data->user;
    	// dd($data);

    	return view('book', ['data' => $data, 'cities' => $cities]);
    }

    public function genre($genre)
    {
        // $ids = Genre::where('name', $genre)->pluck('book_id');
        // $books = Book::select()->where($ids)->get();
        $books = Genre::with('books');
        $genres = $books->where('name', $genre)->get();
        // dd($genres);
        return view('genre', ['genres' => $genres]);
    }

    public function search(Request $request)
    {
        $value = $request->search;
        $books = Book::where('title', "LIKE", "%" . $value . "%")->orWhere('description', "LIKE", "%" . $value . "%")->orWhere('author_book', "LIKE", "%" . $value . "%")->orWhere('publisher_book', "LIKE", "%" . $value . "%")->get();

        return view('search', ['books' => $books]);
    }
}
