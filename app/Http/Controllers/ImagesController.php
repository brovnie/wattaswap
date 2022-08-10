<?php

namespace App\Http\Controllers;
use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index(Request $request){
        return view('welcome');
    }

    public function store(Request $request){
        $path = public_path('storage/tmp/uploads');
      
        if (!file_exists($path)) {
          mkdir($path, 0777, true);
        }
      
        $file = $request->file('image');
      
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
      
        $file->move($path, $name);
      
        return ['name'=>$name];
      }
}
