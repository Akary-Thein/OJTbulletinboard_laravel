<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
       // return view('posts.create');
    }
    public function create()
    {
        return view('posts.create_post');
    }

    public function store(Request $request)
    {
        $VData=$request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create([
            'title' => $VData['title'],
            'description' => $VData['description'],
            'create_user_id' => 7,
            'updated_user_id' => 7,
        ]);
  
        // Post::create($request->all());
   
        return redirect()->route('posts.post_list')
                        ->with('success','Post created successfully.');
    }

}
