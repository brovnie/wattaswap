<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use File;

class ProductsController extends Controller
{
    /**
     * 
     * Show product
     */
    public function index($product_id) {
        $product = Product::find($product_id);
        return view('products.index',['product' => $product]);
    }
     

    /**
     * 
     * Create product
     */
    public function create() 
    {
        return view('products.create');      
    }

    public function store( Request $request ) {

        $data = request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'location' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        /*if (request('profil_image')) {
            $imagePath = $request->file('profil_image')->store('profiles','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
            $image->save();

            $imageArray = ['profil_image' => $imagePath];
        };*/

      /*  $username->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));
        
        $username->update([
            'new_user' => 0
        ]);*/
        
        $product = Product::create($data); 


        foreach($request->media as $image){     
            $from = public_path('storage/tmp/uploads/'.$image);
            $to = public_path('storage/product_images/'.$image);
        
            File::move($from, $to);
            $product->images()->create([
              'name' => $image,
            ]);
          }

        $message = 'Product is toegevoegd. Bekijk je product <a href=products/' . $product->id . '> Hier </a>';
        session()->flash('alert-message', $message);
        session()->flash('alert-status', 'success');


        return redirect()->route('index');
    }

    /**
     * 
     * Edit product
     */

    /**
     * 
     * Delete product
     */
}
