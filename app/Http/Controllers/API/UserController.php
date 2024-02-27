<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status'  => true, 
            'message' => 'Utilisateurs récupérés avec succès ',
            'users'   => $users,
        ]);
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create(
            [
                'pseudo'   => $request->pseudo,
                'email'    => $request->email,
                'image'    => isset($request['image']) ? uploadImage($request['image']) : 'user.png',
                'password' => Hash::make($request->password),
            ]
        );

        return response()->json(
            [
                'status'   => true, 
                'message'  => 'Utilisateur créé avec succès ',
                'user'    => $user,
            ], 201 
        );
    }





    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'status'   => true, 
            'message'  => 'Utilisateur récupérés avec succès ',
            'users'    => $user->load('posts'),
        ]);
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update(
            [
                'email' => $request->mail,
                'image' => $request->image,
            ]
        );

        if ($request->password)
        {
            if ($request->oldPassword && Hash::check($request->oldPassword, User::find($user->id)->password))
            {
                $user->update(
                    [
                        'password' => Hash::make($request->password)
                    ]
                );
            } else {
                return response()->json(
                    [
                        'message' => 'Mot de passe actuel incorrect, ou non renseigné',
                    ], 400
                );
            }
        }

        return response()->json(
            [
                'status'   => true,
                'message'  => 'Utilisateur supprimé avec succès',
                'users'    => $user
            ]
        );
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(
            [
                'status'   => true,
                'message'  => 'Utilisateur supprimé avec succès',
                'users'    => $user
            ]
        );
    }
}
