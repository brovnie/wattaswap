<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class CitiesApiController extends Controller
{
    public function getCity() {
        $response = Http::withHeaders([
            'X-Parse-Application-Id' => 'QYWkrwfH68esSmWIdaWuUaDYpwVbRBRHVz1O7Rfw',
            'X-Parse-REST-API-Key' => 'Va03yNnsxx7hw4LPRjtBbDPjw3tRSnH47QBlhwJF' 
            ])->get('https://parseapi.back4app.com/classes/Belgiumcities_City?limit=1000&order=name&keys=name');

           if ( $response->successful() ) {
            return $response->getBody()->getContents();
           }  

    }
}
