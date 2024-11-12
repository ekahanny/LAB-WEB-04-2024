<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string'
        ], [
            'name.unique' => 'Nama kategori sudah ada.'
        ]);

        // Membuat kategori baru
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dibuat.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validasi input dengan pengecualian kategori yang sedang diperbarui
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string'
        ], [
            'name.unique' => 'Nama kategori sudah ada.'
        ]);

        // Memperbarui kategori
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success',  'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success',  'Kategori berhasil dihapus.');
    }
}