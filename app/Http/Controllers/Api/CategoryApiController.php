<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public $masterController;

    public function __construct()
    {

    }


    public function index() {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function posts($id) {
        $category = Category::find($id);
        $posts = $category->posts;
        return PostResource::collection($posts);
    }

    public function store(Request $request) {
        // TODO:
    }
}
