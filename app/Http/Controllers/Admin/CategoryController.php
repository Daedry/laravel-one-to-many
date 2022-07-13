<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('admin.categories.index', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // validare data
        $val_data = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        // creare slug
        $slug = Str::slug($request->name);
        $val_data['slug'] = $slug;

        // salvare 
        Category::create($val_data);

        //reindirizzare
        return redirect()->back()->with('message', "Category $slug added successfully!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        // validare data
        $val_data = $request->validate([
            'name' => ['required', Rule::unique('categories')->ignore($category)]
        ]);

        // creare slug
        $slug = Str::slug($request->name);
        $val_data['slug'] = $slug;

        // salvare
        $category->update($val_data);

        //reindirizzare
        return redirect()->back()->with('message', "Category $slug updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', "Category $category->name deleted successfully!");
    }
}
