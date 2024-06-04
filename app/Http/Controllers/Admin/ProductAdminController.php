<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric',
        'description' => 'required|string',
    ]);

    // Only validate old_price and discount if the discount toggle is on
    if ($request->has('toggle_discount')) {
        $request->validate([
            'old_price' => 'required|numeric',
            'discount' => 'required|integer',
        ]);
    }

    $imageName = $request->file('image')->getClientOriginalName();
    $path = $request->file('image')->storeAs('public/images', $imageName);

    $product = Product::create([
        'name' => $request->input('name'),
        'image' => $path,
        'price' => $request->input('price'),
        'old_price' => $request->input('old_price'),
        'discount' => $request->input('discount'),
        'description' => $request->input('description'),
    ]);

    return $this->index();
}


    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validation and update logic
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return $this->index();
    }
}
