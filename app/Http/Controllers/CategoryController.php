<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        return view('categories.categories',[
            'categories' => Category::all(),
        ]);
    }

    public function show($id) {

        return view('categories.category',[
            'category' => Category::find($id),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'category_title' => 'required',
            'category_color' => 'required'
        ]);

        $category = new Category();
        $category->title = $request->get('category_title');
        $category->color = $request->get('category_color');
        $category->save();
        return redirect()->back()->with('message', 'Category created');
    }
}
