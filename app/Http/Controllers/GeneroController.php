<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\ProductController;
use App\Models\Product;

class GeneroController extends Controller
{
    public function genders()
    {
        $product = Product::all();

        return view('genders', compact('product'));
    }
    //
}
