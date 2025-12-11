<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('user.show', compact('user'));
    }

    public function edit() {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();

        // Correction: Validation de firstname et lastname au lieu de name
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Correction: Enregistrement de firstname et lastname
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');

        $user->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            // Vous devriez supprimer l'ancien avatar ici si vous en avez un
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();
        return redirect()->route('user.show')->with('success', 'Profil mis à jour avec succès');
    }
}
