<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $books = Book::where('user_id', $user);
        $total = $books->count();
        $sell = Book::where([
            'user_id' => $user,
            'sold' => 0
        ])->count();
        $sold = $total - $sell;

        $data = [
            'total' => $total,
            'sell' => $sell,
            'sold' => $sold,
        ];
        return view('dashboard.index', $data);
    }
}
