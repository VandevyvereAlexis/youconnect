<?php

namespace App\Http\Controllers;

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
            'message' => 'Utilisateur récupérés avec succès ',
            'users'   => $users,
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
                'pseudo'   => 'required|string|alpha_dash|min:3|max:20|unique:users',
                'email'    => 'required|email|unique:users|max:255',
                'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'password' => 
                [
                    'required',         
                    'confirmed',        
                    Password::min(8)    
                        ->mixedCase()   
                        ->letters()     
                        ->numbers()     
                        ->symbols()     
                ],
            ],
        );

        if ($validator->fails()) 
        {
            return response()->json($validator->error(), 400);
        };

        $user = User::create(
            [
                'pseudo'   => $request->pseudo,
                'email'    => $request->email,
                'image'    => $request->image,
                'password' => Hash::make($request->password),
            ]
        );

        return response()->json(
            [
                'status'   => true, 
                'message'  => 'Utilisateur récupérés avec succès ',
                'users'    => $user,
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
        $validator = Validator::make(
            $request->all(), 
            [
                'email'       => 'required|email|unique:users|max:255',
                'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'oldPassword' => 'nullable',
                'password'    => 
                [
                    'required',         
                    'confirmed',        
                    Password::min(8)    
                        ->mixedCase()   
                        ->letters()     
                        ->numbers()     
                        ->symbols()     
                ],
            ],
        );

        if ($validator->fails()) 
        {
            return response()->json($validator->error(), 400);
        };

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
