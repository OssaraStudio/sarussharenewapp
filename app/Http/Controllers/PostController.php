<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate();
        return view('posts.posts', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        $images = $post->images;
        $videos = $post->videos;
        return view('posts.post', compact('post', 'images', 'videos'));
    }

    public function newPost() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.new-post', compact('categories', 'tags'));
    }

    public function store(Request $request) {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required',
        ]);


        $user = Auth::user();

        $post = new Post();
        $post->title = $request->input('post_title');
        $post->content = $request->input('post_content');
        $post->category_id = intval($request->input('post_category'));
        $post->author_id = $user->id;
        $post->post_type = 'text';
        $post->save();

        if($request->has('post_tags')) {
            foreach($request->input('post_tags') as $id) {
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $id
                ]);
            }
        }

        if($request->hasFile('post_images')) {
            $counter = 0;
            $images = $request->file('post_images');
            foreach($images as $image) {
                $path = $image->store('public');
                $image = new Image();
                $image->description = '';
                $image->url = $path;
                $image->post_id = $post->id;
                if($counter == 0) {
                    $image->featured = true;
                } else {
                    $image->featured = false;
                }
                $image->save();
                $counter++;
            }
        }

        return redirect(route('posts'));
    }
}
