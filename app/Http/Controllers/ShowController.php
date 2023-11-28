<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        return view('producto.show', compact('producto'));
    }
    //
}
