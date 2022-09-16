<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories', compact('categories'));
    }

    public function view($id)
    {
        $category = Categories::find($id);
        return view('categories-view', compact('category'));
    }
}
