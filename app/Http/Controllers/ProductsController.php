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
        $product = Product::where('id',$product_id)->firstOrFail();
        $product_imgs = Product::find($product_id)->images;
        $arrImgs = [];
        foreach($product_imgs as $img) {
            array_push($arrImgs, $img->name);
        }
        return view('products.index',['product' => $product, 'product_imgs' => $product_imgs]);
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
        $user = Auth::id();
        $product = Product::where('id',$product_id)->firstOrFail();
        $product_imgs = Product::find($product_id)->images;
        $arrImgs = [];
        foreach($product_imgs as $img) {
            array_push($arrImgs, $img->name);
        }

        return view('products.edit', [ 'product' => $product, 'product_imgs' => $arrImgs ]);    
    }
    public function update($product_id, Request $request){
        $product = Product::find($product_id)->firstOrFail();

        $product_imgs = Product::find($product_id)->images;
        $data = request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'location' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product->find($product_id)->update($data);
        $product->refresh(); 


        if(isset($request->added_media)){
          foreach($request->added_media as $image){
            $from = public_path("storage/tmp/uploads/" . $image);
            $to = public_path("storage/product_images/" . $image);
      
            File::move($from, $to);
            $product->images()->create([
              'name' => $image,
            ]);
          }
        }
      
        if(isset($request->deleted_media)){
          foreach($request->deleted_media as $deleted_media){
            File::delete(public_path('storage/product_images/'.$deleted_media));
            Image::where('name', $deleted_media)->delete();
          }
        }
        $product->save(); 
        $product = Product::where('id',$product_id)->firstOrFail();
   return view('products.index',['product' => $product, 'product_imgs' => $product_imgs]);

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
            return view('products.searchResults', [ 'requestedProducts' => '' ]);    
        }
      }

      public function searchResults($request) {
        return print_r($request);
      }
}
