<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\updateCommentRequest;
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
            'message' => 'commentaire récupérés avec succès ',
            'comments' => $comments,
        ]);
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->all());
        $comment->update(['image' => isset($request['image']) ? uploadImage($request['image']) : 'user.png',]);

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
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

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
