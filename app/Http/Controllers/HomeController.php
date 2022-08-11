<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$ip = $this->getIp(); 
        //$currentUserInfo = Location::get($ip);
        //<h4>City Name: {{ $currentUserInfo->cityName }}</h4>


    return view('welcome'/*, compact('currentUserInfo')*/);
    }


}
