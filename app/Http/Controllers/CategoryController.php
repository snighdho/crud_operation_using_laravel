<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable|boolean', // Optionally add boolean validation for status
        ]);

        // Create a new category using the validated data
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
        ]);

        // Redirect back to the previous page with a success message
        return redirect()->route('category.index')->with('status', 'Category Created Successfully');
    }

    public function show(Category $category)
    {
        return view('category.show' , compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable|boolean', // Optionally add boolean validation for status
        ]);

        // Create a new category using the validated data
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
        ]);

        // Redirect back to the previous page with a success message
        return redirect('/category')->with('status', 'Category updated Successfully');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('status', 'Category Deleted Successfully');
    }
}
