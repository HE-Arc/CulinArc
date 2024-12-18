<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        //Connexion automatique avec l'utilisateur créé
        Auth::login(User::create($validated));

        return redirect()->route('home')->with('success', 'Compte créé avec succès!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Connecté avec succès!');
        }

        return back()->withErrors([
            //utilisation des valeurs de traduction
            __('auth.failed')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Déconnecté avec succès!');
    }

    /*
    * Affiche la liste des recettes favorites de l'utilisateur connecté
    */
    public function favorites()
    {
        $recipes = Auth::user()->recipes;
        return view('users.favorites', compact('recipes'));
    }
}