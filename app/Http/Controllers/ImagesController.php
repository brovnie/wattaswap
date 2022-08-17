<?php

namespace App\Http\Controllers;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Models\Product;

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

      public function getImages($product_id){
        $product = Product::find($product_id)->firstOrFail();
        $images = $product->images;
        return ['media'=>$images];
      }
}
