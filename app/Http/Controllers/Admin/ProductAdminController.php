<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
    // Validate the required fields
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric',
        'description' => 'required|string',
    ]);

    // Validate additional fields if discount is enabled
    if ($request->has('toggle_discount')) {
        $request->validate([
            'old_price' => 'required|numeric',
            'discount' => 'required|integer',
        ]);
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name for the image
        $imagePath = public_path('images'); // Public images path

        // Ensure the directory exists
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true); // Create directory if it doesn't exist
        }

        // Move the image to the public/images directory
        $image->move($imagePath, $imageName);

        // Save the product with the image path
        $product = Product::create([
            'name' => $validatedData['name'],
            'image' => 'images/' . $imageName, // Store relative path
            'price' => $validatedData['price'],
            'old_price' => $request->input('old_price'), // Optional field
            'discount' => $request->input('discount'), // Optional field
            'description' => $validatedData['description'],
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
        } else {
            // Handle the case where the image is not uploaded
            return redirect()->back()->withErrors(['image' => 'Image upload failed. Please try again.']);
        }
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
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
            'old_price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        // Update product details
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                $oldImagePath = public_path($product->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name for the image
            $imagePath = public_path('images'); // Public images path

            // Ensure the directory exists
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true); // Create directory if it doesn't exist
            }

            // Move the image to the public/images directory
            $image->move($imagePath, $imageName);
            $product->image = 'images/' . $imageName; // Update the product image path
        }

        // Handle discount fields if applicable
        if ($request->has('toggle_discount') && $request->input('toggle_discount')) {
            $product->old_price = $validatedData['old_price'];
            $product->discount = $validatedData['discount'];
        } else {
            $product->old_price = null;
            $product->discount = null;
        }

        // Save the updated product
        $product->save();

        // Redirect back with success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    

    public function destroy(Request $request, Product $product)
    {
        // Check if the product has an image
        if ($product->image) {
            $imagePath = public_path($product->image);
            // Check if the image file exists and delete it
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the product from the database
        $product->delete();

        // Redirect back with success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
    }
