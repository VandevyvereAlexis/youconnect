<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;


class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
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
        ];
    }

    public function messages()
    {
        return [
            'pseudo.required' => 'Le pseudo est requis.',
            'pseudo.string' => 'Le pseudo doit être une chaîne de caractères.',
            'pseudo.min' => 'Le pseudo doit faire au moins 4 caractères.',
            'pseudo.max' => 'Le pseudo ne doit pas dépasser 25 caractères.',
            'email.unique' => 'Pseudo déjà utilisé.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'Email invalide.',
            'pseudo.min' => 'L\'email doit faire au moins 7 caractères.',
            'pseudo.max' => 'L\'email ne doit pas dépasser 50 caractères.',
            'email.unique' => 'Email déjà utilisé.',
            'password.required' => 'Le mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.confirmed' => 'Confirmation du mot de passe incorrecte.',
        ];
    }
}
