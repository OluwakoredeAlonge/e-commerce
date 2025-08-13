<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.add-category', compact('categories'));
    }
   public function store(Request $request)
    {
        //   dd($request->all());
        $validated = $request->validate([
            'categoryName' => 'required|string|max:255',
        ]);
        Category::create([
            'name' => $validated['categoryName'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }
 
    /**
     * Edit a category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::paginate(20); // fetch all paginated categories
        return view('admin.add-category', compact('category', 'categories'));
    }


/**
 * Remove the specified category from storage.
 *
 * @param  \App\Models\Category  $category
 * @return \Illuminate\Http\Response
 */

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function update(Request $request, Category $category){
        $validated = $request->validate([
            'categoryName' => 'required|string|max:255',
        ]);
        $category->update([
            'name' => $validated['categoryName'],
        ]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
}
