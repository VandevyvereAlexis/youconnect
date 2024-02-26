<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;





class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return response()->json([
            'status' => true, 
            'message' => 'commentaires récupérés avec succès ',
            'comments' => $comments,
        ]);
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'content'  => 'required|string|min:5|max:255',
                'tags'     => 'required|string|max:255',
                'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
        );

        if ($validator->fails()) 
        {
            return response()->json($validator->error(), 400);
        };

        $comment = Comment::create(
            [
                'content'   => $request->content,
                'tags'      => $request->tags,
                'image'     => $request->image,
                'post_id'   => $request->post_id,
                'user_id'   => $request->user_id,
            ]
        );

        return response()->json(
            [
                'status'      => true, 
                'message'     => 'commentaires récupérés avec succès ',
                'comments'    => $comment,
            ], 201 
        );
    }





    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return response()->json([
            'status'      => true, 
            'message'     => 'commentaires récupérés avec succès ',
            'comments'    => $comment,
        ]);
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'content'  => 'required|string|min:5|max:255',
                'tags'     => 'required|string|max:255',
                'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
        );

        if ($validator->fails()) 
        {
            return response()->json($validator->error(), 400);
        };

        $comment->update(
            [
                'content'   => $request->content,
                'tags'      => $request->tags,
                'image'     => $request->image,
                'post_id'   => $request->post_id,
                'user_id'   => $request->user_id,
            ]
        );

        return response()->jon(
            [
                'status'      => true, 
                'message'     => 'commentaires mmodifié avec succès',
                'comments'    => $comment,
            ]
        );
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->jon(
            [
                'status'      => true, 
                'message'     => 'commentaires supprimé avec succès',
                'comments'    => $comment,
            ]
        );
    }
}
