<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //TODO : add login page
    }

    public function create()
    {
        //TODO : add signup page
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('/')->with('success', 'User created successfully!');
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
            'name' => 'required|min:2|max:50',
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

        return redirect()->route('/')->with('success', 'User updated successfully!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('/')->with('success', 'User deleted successfully!');
    }
}