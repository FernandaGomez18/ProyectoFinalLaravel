<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate(Product::$rules);

        $product = Product::create($request->all());

        if ($request->hasFile('rutaImg')) {
            $product->storeImage($request->file('rutaImg'));
        }

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(Product::$rules);

        $product->update($request->except('rutaImg'));

        if ($request->hasFile('rutaImg')) {
            Storage::delete($product->rutaIMG);
            $product->storeImage($request->file('rutaImg'));
        }

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
