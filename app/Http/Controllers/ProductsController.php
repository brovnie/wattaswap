<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use File;
use Illuminate\Support\Facades\Response;

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

        //TODO: Bind user with product

        $user = Auth::user()->profile;
        $product = $user->products()->create($data);
        
        foreach($request->media as $image){     
            $from = public_path("storage/tmp/uploads/" . $image);
            $to = public_path("storage/product_images/" . $image);
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
    public function edit($product_id){
        $product = Product::where('id',$product_id)->firstOrFail();
      //  print_r($product->location);
        return view('products.edit', [ 'product' => $product ]);    
    }
    public function update(){
        return view('welcome');    

    }
    /**
     * 
     * Delete product
     */

     /**
      * 
      * Search / Sort 
      */
      public function search( Request $request)
      {
        $search = $request->get('search');
        $requestedProducts =  Product::where('title', 'like', '%'.$search.'%')
                                        ->orWhere('description', 'like', '%'.$search.'%')
                                        ->get();
        if(!empty($requestedProducts)) {
            return view('products.searchResults', [ 'requestedProducts' => $requestedProducts ]);    
        } else {
            session()->flash('search-message', 'Geen product gevonden');
            session()->flash('alert-status', 'danger');
            //TODO: return current view
        }
      }

      public function searchResults($request) {
        return print_r($request);
      }
}
