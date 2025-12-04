<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class NewPasswordController extends Controller {
    use PasswordValidationRules;
    /**
     * Affiche le formulaire de réinitialisation du mot de passe
     */
    public function create(Request $request) {
        return view('auth.reset-password', [
            'request' => $request
        ]);
    }

    /**
     * Traite la soumission du formulaire
     */
    public function store(Request $request) {
        Validator::make($request->all(), [
            'password'=> ['required','confirmed', RulesPassword::defaults()],
        ], [
            'password.required' => 'Le champ mot de passe est obligatoire.',
            '*.required' => 'Le champ :attribute est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'Le mot de passe et la confirmation doivent être identiques.',
            'password.mixed' => 'Le mot de passe doit contenir des majuscules et des minuscules.',
        ])->validate();


        // Tentative de réinitialisation
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // Vérification du résultat
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')
                ->with('alert.type', 'success')
                ->with('alert.message', 'Mot de passe réinitialisé');
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}
