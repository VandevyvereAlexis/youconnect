<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'status'  => true, 
            'message' => 'Posts récupérés avec succès ',
            'posts'   => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([                                                                    
            'content' => 'required|min:25|max:1000',                                           
            'tags'    => 'required|min:3|max:50',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 

        Post::create([                                                                          
            'content' => $request->content,                                                                                              
            'tags' => $request['tags'],                                                        
            'image' => $request->input('image'),
            'user_id' => Auth::user()->id,                                                 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'status' => true, 
            'message' => 'Posts récupérés avec succès ',
            'posts' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
