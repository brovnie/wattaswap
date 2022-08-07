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

    /**
     * 
     * Edit product
     */

    /**
     * 
     * Delete product
     */
}
