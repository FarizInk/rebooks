<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
      'slug', 'user_id', 'cover', 'title', 'description', 'condition', 'price', 'author_book', 'publisher_book', 'publication_year_book', 'sold'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function genres()
    {
      // return $this->hasMany('App\Genre', 'book_id');
      return $this->belongsToMany('App\Genre')->withPivot('book_id', 'genre_id');
    }

    public function images()
    {
      return $this->hasMany('App\Image', 'book_id');
    }
}
