<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Genre;
use App\City;
use App\User;

class BooksController extends Controller
{
    public function index()
    {
    	$data = Book::select('cover', 'title', 'price', 'slug');
    	$books = $data->where('sold', '0')->orderBy('id', 'desc')->get();

        // $books = Book::with('genres')->where('sold', '0')->get();
        // $api = null;
        // foreach ($books as $book) {
        //     $api = $api . $book->id . ",";
        //     echo $api;
        // }

    	return response()->json([
    		'books' => $books 
    	]);
    }

    public function book($slug)
    {
        $id = Book::with('genres')->where('slug', $slug)->value('id');
        $user_id = Book::where('slug', $slug)->value('user_id');

    	$books = Book::where('id', $id)->get();
    	
        $users = User::where('id', $user_id)->get();
        $genre = null;
        foreach ($books as $book) {
            $countgenre = count($book->genres);
            foreach ($book->genres as $key => $data) {
                if ($key == $countgenre - 1) {
                    $genre = $genre . $data->name;
                } else {
                    $genre = $genre . $data->name . ', ';
                }
            }
        }

        foreach ($books as $book) {
        foreach ($users as $user) {
            $user_city = City::where('id', $user->city_id)->value('name');
            $data = [
                'cover' => $book->cover,
                'title' => $book->title,
                'description' => $book->description,
                'condition' => $book->condition,
                'price' => $book->price,
                'genre' => $genre,
                'author_book' => $book->author_book,
                'publication_year_book' => $book->publication_year_book,
                'user_photo' => $user->img,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
                'user_address' => $user->address,
                'user_city' => $user_city,
            ];
        }
        }
    	return response()->json([
    		'book' => $data
    	]);
    }
}
