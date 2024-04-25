<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
            'password' => 'nullable|string',
            'is_admin' => 'required|boolean',
        ]);

        // Construct the array of attributes to update
        $attributesToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_admin' => $validated['is_admin'],
        ];

        // Check if password is provided and add it to the array if present
        if ($request->filled('password')) {
            $attributesToUpdate['password'] = Hash::make($validated['password']);
        }

        // Update the user with the constructed array of attributes
        $user->update($attributesToUpdate);

        // Redirect back with success message or to a specific route
        return redirect()->route('dashboard-users')->with('success', 'User updated successfully');
    }

    public function destroy($user_id)
    {
        // Nájdenie otázky podľa kódu
        $user = User::where('id', $user_id)->firstOrFail();

        // Odstránenie otázky
        $user->delete();

        // Presmerovanie na určenú cestu
        return redirect()->route('dashboard-users')->with('success', 'Question deleted successfully');
    }
}
