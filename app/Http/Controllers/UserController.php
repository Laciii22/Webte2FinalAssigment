<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.user-dashboard', compact('users'));
    }

    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'admin' => 'required|boolean',
        ]);

        // Construct the array of attributes to update
        $attributesToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_admin' => $validated['admin'],
        ];



        // Check if password is provided and add it to the array if present
        if ($request->filled('password')) {
            $attributesToUpdate['password'] = Hash::make($validated['password']);
        }

        // Update the user with the constructed array of attributes
        $user->update($attributesToUpdate);

        // Redirect back with success message or to a specific route
        return redirect("/dashboard-users")->with('success', 'User updated successfully');
    }

    public function destroy($user_id)
    {
        // Nájdenie otázky podľa kódu
        $user = User::where('id', $user_id)->firstOrFail();

        // Odstránenie otázky
        $user->delete();

        // Presmerovanie na určenú cestu
        return redirect()->route('dashboard-users')->with('success', 'User deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'admin' => 'required|boolean',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->admin,
        ]);

        return redirect()->route('dashboard-users')->with('success', 'User created successfully');
    }
}
