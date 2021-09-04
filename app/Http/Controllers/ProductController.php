<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        return view('products.index')->with(['products'=>$products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);        

        return redirect()->route('admin.createProducts')->withMessage('Product has been created successfully !');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.update')->with(['product'=> $product]);
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required'
        ]);

        $input = $request->all();

        $product->fill($input)->save();

        return redirect()->route('user.products')->withMessage('Product updated successfully!');
    }

    public function Delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('user.products')->withMessage('Product has been deleted successfully !');

    }

}
