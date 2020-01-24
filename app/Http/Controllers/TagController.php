<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        return view('tags.tags',[
            'tags' => Tag::all(),
        ]);
    }

    public function show($id) {
        return view('tags.tag', [
            'tag' => Tag::find($id)
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'tag_title' => 'required'
        ]);

        $tag = new Tag();
        $tag->title = $request->get('tag_title');
        $tag->save();
        return redirect()->back()->with('message', 'Tag has been created');

    }
}
