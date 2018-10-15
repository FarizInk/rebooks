<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
    'book_id', 'name'
  ];

    public function books()
    {
    	return $this->belongsTo('App\Book');
    }
}
