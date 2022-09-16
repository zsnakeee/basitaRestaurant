<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories-create');
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view('admin.categories-edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Categories::create([
            'name' => $request->name,
            'image' => $request->image->store('public/categories'),
        ]);

        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->route('admin.categories');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Categories::find($id);
        $category->name = $request->name;

        if($request->has('image'))
            $category->image = $request->image->store('public/categories');

        $category->save();

        return redirect()->route('admin.categories');
    }
}
