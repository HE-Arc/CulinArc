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

        Auth::login(User::create($validated));

        return redirect()->route('home')->with('success', 'User created successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    public function show(string $id)
    {
        //TODO : add user profile page
    }

    public function edit(string $id)
    {
        //TODO : add user edit page
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('home')->with('success', 'User updated successfully!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home')->with('success', 'User deleted successfully!');
    }

    public function favorites()
    {
        $recipes = Auth::user()->recipes;
        return view('users.favorites', compact('recipes'));
    }
}