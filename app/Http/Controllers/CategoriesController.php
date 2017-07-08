<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function fetchCategories()
    {
        $categories = Category::with('links')->orderBy('name', 'asc')->get();

        return response()->json($categories, 200);
    }

    public function postCategory(Request $request)
    {
        $category = $request->all();

        //dd($request->all());
        Category::forceCreate([
            'name' => $category['name']
        ]);
        return response()->json('Success', 200);
    }
}
