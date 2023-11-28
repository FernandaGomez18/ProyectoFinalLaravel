<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class FormController extends Controller
{
    public function form()
    {
        $products = Product::paginate(10);

        return view('product.index', compact('products'));
    }
    //
}
