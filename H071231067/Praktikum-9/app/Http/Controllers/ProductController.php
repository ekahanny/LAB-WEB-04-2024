<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\InventoryLog;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->input('category');

        $products = Product::with('category')
            ->when($selectedCategory, function($query) use ($selectedCategory) {
                return $query->where('category_id', $selectedCategory);
            })
            ->get();

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ], [
            'name.unique' => 'Product name already exists.',
            'price.min' => 'Price must be greater than zero.'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ], [
            'name.unique' => 'Product name already exists.',
            'price.min' => 'Price must be greater than zero.'
        ]);

        $originalStock = $product->stock;

        // Update produk
        $product->update($request->all());

        if ($request->stock != $originalStock) {
            $quantityChange = $request->stock - $originalStock;
            $type = $quantityChange > 0 ? 'restock' : 'sold';

            InventoryLog::create([
                'product_id' => $product->id,
                'type' => $type,
                'quantity' => abs($quantityChange),
                'timestamps' => now(),
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
