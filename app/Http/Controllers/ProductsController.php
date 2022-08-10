<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
        
        Product::create($data); 

        session()->flash('alert-message', '<strong> Product is toegevoegd </strong>.');
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
