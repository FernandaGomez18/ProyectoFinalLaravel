<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class EditController extends Controller
{
    public function edit($id)
    {
        $products= Product::find($id);
        if (!$products) {
            return redirect()->route('product.index')->with('error', 'Artista no encontrado');
        }
        return view('product.edit', compact('products'));
    }
    //
}
