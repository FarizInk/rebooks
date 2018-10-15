<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\City;
use Illuminate\Http\Request;

/**
* 
*/
class CityController extends Controller
{
	
	public function show ()
	{
      $cities = City::orderBy('name', 'asc')->get();
      
      return response()->json($cities);
	}

    // public function show (City $city)
    // {
    //     return success_response()->resources($city);
    // }
}