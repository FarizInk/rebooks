<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
      'book_id', 'name'
    ];

    public function books()
    {
    	// return $this->belongsTo('App\Book', 'book_id');
    	return $this->belongsToMany('App\Book')->withPivot('book_id', 'genre_id');
    }
}
