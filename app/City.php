<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name'];

    public function user()
    {
      return $this->hasMany('App/User', 'city_id', 'id');
    }
}
