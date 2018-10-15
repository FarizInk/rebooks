<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Genre;
use App\User;
use App\City;
use App\Image as Imagepost;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	$books = Book::where([
            'user_id' => $id,
            'sold' => 0 
        ])->get();
        // dd($books);
    	$number = 1;
        $data = [
            'books' => $books,
            'number' => $number
        ];

    	return view('dashboard.book.index', $data);
    }

    public function show($slug)
    {
    	$cities = City::all();

    	$book = Book::where('slug', $slug);
    	$data = $book->get();
    	$user = $book->value('user_id');

    	if (Auth::user()->id != $user) {
    		return redirect()->back();
    	}
    	return view('dashboard.book.show', ['data' => $data, 'cities' => $cities]);
    }

	public function create()
    {
        $mytime = Carbon::now();
        $genres = Genre::all();

    	return view('dashboard.book.create', ['mytime' => $mytime, 'genres' => $genres]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cover' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:ratio=1',
            'title' => 'required|string|max:180',
            'description' => '',
            'genres' => 'required|max:180',
            'condition' => 'required',
            'price' => 'required|numeric',
            'author_book' => 'required|string|max:180',
            'publisher_book' => 'required|string|max:180',
            'publication_year_book' => 'required|max:4',
        ]);
    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:180',
            'description' => '',
            'genres' => 'required|max:180',
            'condition' => 'required',
            'price' => 'required|numeric',
            'author_book' => 'required|string|max:180',
            'publisher_book' => 'required|string|max:180',
            'publication_year_book' => 'required|max:4',
        ]);
    }

    protected function validatorCover(array $data)
    {
        return Validator::make($data, [
            'cover' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:ratio=1',
        ]);
    }

    public function rules()
    {
        $images = count($this->input('images'));
        foreach(range(0, $images) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
 
        return $rules;
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $id = Auth::user()->id;
        //store cover
        $cover = $request->cover;
        $covername  = time() . '.' . $cover->getClientOriginalExtension();
        // $coverpath = public_path('images/cover/' . $covername);
        // $imgcover = Image::make($cover->getRealPath());
        // $imgcover->fit(400)->save($coverpath);
        $cover->move(public_path('images/cover'), $covername);
        
        //make slug
        $toLower = strtolower($request->title);
        $slug = str_slug($toLower) . "-" . hash('crc32b', uniqid());

        //store book
        $book = Book::create([
        	'slug' => $slug,
        	'user_id' => $id,
        	'cover' => $covername,
        	'title' => $request->title,
        	'description' => $request->description,
        	'condition' => $request->condition,
        	'price' => $request->price,
        	'author_book' => $request->author_book,
        	'publisher_book' => $request->publisher_book,
        	'publication_year_book' => $request->publication_year_book,
            'sold' => '0',
        ]); 
        //make genres & store
        foreach ($request->genres as $key => $value) {
            $book->genres()->attach($value);
        }

        //if isset images
        if ($request->images) {
        	$images = $request->images;
        	$no = 1;
        	foreach ($images as $image) {
		        $imagename  = $book->id . '-' . time() . '-' . $no++ . '.' . $image->getClientOriginalExtension();
		        // $imagepath = public_path('images/post/' . $imagename);
		        // $img = Image::make($image->getRealPath());
		        // $img->save($imagepath);
                $image->move(public_path('images/post'), $imagename);

	        	Imagepost::create([
	        		'book_id' => $book->id,
	        		'name' => $imagename,
	        	]);
        	}
        }
        return redirect()->route('dashboard.book.create')->with('response', 'Buku ' . $book->title . ' berhasil di tambahkan ke ');
    }

    public function edit($slug)
    {
    	$book = Book::where('slug', $slug);
    	$data = $book->get();
    	$user = $book->value('user_id');
        $genres = Genre::all();

    	if (Auth::user()->id != $user) {
    		return redirect()->back();
    	}

		return view('dashboard.book.edit', ['data' => $data,'genres' => $genres]);
    }

    public function update($book_slug, Request $request)
    {
    	$book = Book::where('slug', $book_slug);
    	$user = $book->value('user_id');

    	if (Auth::user()->id != $user) {
    		return redirect()->back();
    	}
		$this->validatorUpdate($request->all())->validate();
        $id = Auth::user()->id;

        $bookid = Book::where('slug', $book_slug)->value('id');

        //store book
        $bookupdate = Book::where('slug', $book_slug)->update([
        	'title' => $request->title,
        	'description' => $request->description,
        	'condition' => $request->condition,
        	'price' => $request->price,
        	'author_book' => $request->author_book,
        	'publisher_book' => $request->publisher_book,
        	'publication_year_book' => $request->publication_year_book,
        ]);
        $bookfind = Book::find($bookid);
        $genres = $bookfind->genres()->get();
        // delete old genres
        foreach ($genres as $key => $value) {
            $bookfind->genres()->detach($value);
        }
        // add new genres
        foreach ($request->genres as $key => $value) {
            $bookfind->genres()->attach($value);
        }

        //if isset images
        if ($request->images) {
        	$images = $request->images;
        	$no = 1;
        	foreach ($images as $image) {
		        $imagename  = $bookid . '-' . time() . '-' . $no++ . '.' . $image->getClientOriginalExtension();
		        // $imagepath = public_path('images/post/' . $imagename);
		        // $img = Image::make($image->getRealPath());
		        // $img->save($imagepath);
                $image->move(public_path('images/post'), $imagename);
	        	Imagepost::create([
	        		'book_id' => $bookid,
	        		'name' => $imagename,
	        	]);
        	}
        }
        //if isset images delet
        if ($request->imagesrep) {
        	$imagesrep = $request->imagesrep;
        	foreach ($imagesrep as $imagerep) {
        		Imagepost::where('name', $imagerep)->delete();
        	}
        }
        return redirect()->route('dashboard.book')->with('response', 'Berhasil Mengedit data buku!');
    }

    public function updateCover($slug, Request $request)
    {
    	$bookData = Book::where('slug', $slug);
    	$data = $bookData->get();
    	$user = $bookData->value('user_id');
    	$book = $bookData->value('id');

    	if (Auth::user()->id != $user) {
    		return redirect()->back();
    	}
        $this->validatorCover($request->all())->validate();
        $book = Book::find($book);
        $bookCover = $book->cover;
        File::delete(public_path() . '/images/cover/' . $bookCover);
        $cover = $request->cover;
        $filename  = time() . '.' . $cover->getClientOriginalExtension();
        // $path = public_path('images/cover/' . $filename);
        // $img = Image::make($cover->getRealPath());
        // $img->fit(200)->save($path);
        $cover->move(public_path('images/cover'), $filename);
        // $img->resize(200, 200)->save($path);
        $book->cover = $filename;
        $book->save();
        return redirect()->route('dashboard.book.edit', $slug)->with('response', 'Update foto cover berhasil!');
    }

    public function genre($genres, $bookid)
    {
        $i = null;
        $pisahspasi = explode(' ', $genres);
        foreach ($pisahspasi as $value) {
            $i = $i . $value;
        }
        $genres = explode(',', $i);

        foreach ($genres as $genre) {
            if ($genre == "" || $genre ==" ") {
            } else {
                Genre::create([
                    'book_id' => $bookid,
                    'name' => trim($genre),
                ]);
            }
        }
    }

    public function destroy(Request $request)
    {
        $book_id = Book::where('id', $request->id);
        $user = $book_id->value('user_id');
        $id = $book_id->value('id');

        if (Auth::user()->id != $user) {
            return redirect()->back();
        }
        Imagepost::where('book_id', $id)->delete();
        Genre::where('book_id', $id)->delete();
        Book::where('id', $id)->delete();

        return redirect()->back();
    }

    public function sold($slug)
    {
        $bookData = Book::where('slug', $slug);
        $data = $bookData->get();
        $user = $bookData->value('user_id');
        $book = $bookData->value('id');

        if (Auth::user()->id != $user) {
            return redirect()->back();
        }

        Book::where('id', $book)->update([
            'sold' => '1'
        ]);
        return redirect()->route('dashboard.book')->with('response', 'Anda bisa melihat daftar buku terjual di History');
    }

    public function history()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $books = Book::where([
            'user_id' => $id,
            'sold' => 1
        ])->get();
        // dd($books);
        $number = 1;


        return view('dashboard.book.history', ['books' => $books, 'number' => $number]);
    }
}
