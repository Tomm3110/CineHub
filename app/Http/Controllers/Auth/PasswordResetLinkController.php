<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller {

    /**
     * Displays the "Forgot Password" view to the user.
     *
     * @return \Illuminate\View\View The view for the forgot password page.
     */
    public function create() {
        return view('auth.forgot-password');
    }


    public function store(Request $request): RedirectResponse {

        // Validation des informations
        $this->validateRequest($request);

        //Validation avant envoi
        $this->beforeSendingResetLink($request);

        // Envoi du lien de réinitialisation
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Logique après envoi
        $this->afterSendingResetLink($request, $status);

        return $status === Password::RESET_LINK_SENT
            ? redirect(route('accueil'))
                ->with('alert.type', 'success')
                ->with('alert.message', "Un message vient de vous être transmis")
            : back()->withInput($request->only('email'))
                ->with('alert.type', 'error')
                ->with('alert.message', "Nous n'avons pas pu vous envoyer le mail de réinitialisation : " . __($status));
    }

    /**
     * Validates the given request to ensure the 'email' field is present, properly formatted,
     * and exists in the 'users' table. Custom error messages are provided for validation failures.
     * If validation fails, a ValidationException is thrown.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request to validate.
     * @throws \Illuminate\Validation\ValidationException If the validation fails.
     */
    protected function validateRequest($request) {
        // Validation personnalisée
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.exists' => 'Aucun compte n\'est associé à cette adresse email.',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * Executes custom logic before sending a password reset link. This may include logging information,
     * enforcing rate limiting, or performing additional checks. Logs details about the reset request
     * such as the email, IP address, and user agent. Invokes a method to verify rate limiting.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request containing the reset link request data.
     * @return void
     * @throws \Illuminate\Http\Exceptions\ThrottleRequestsException If the request exceeds allowed rate limits.
     */
    protected function beforeSendingResetLink($request): void {
        // Logique personnalisée avant envoi
        // Par exemple : logging, limitation de taux, vérifications supplémentaires

        Log::info('Demande de réinitialisation de mot de passe', [
            'email' => $request->email,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        // Vérifier si l'utilisateur n'a pas fait trop de demandes récemment
        $this->checkRateLimit($request);
    }

    /**
     * Checks the rate limit for password reset requests based on the provided email.
     * If a request has already been made recently for the same email, a ValidationException is thrown.
     * Otherwise, a cache entry is created to block further requests for 5 minutes.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request containing the email to check.
     * @throws \Illuminate\Validation\ValidationException If the rate limit has been exceeded.
     */
    protected function checkRateLimit($request) {
        $key = 'password_reset_' . $request->email;

        if (\Cache::has($key)) {
            throw ValidationException::withMessages([
                'email' => ['Vous avez déjà demandé un lien de réinitialisation récemment. Veuillez attendre.']
            ]);
        }

        // Bloquer pour 5 minutes
        \Cache::put($key, true, now()->addMinutes(5));
    }

    /**
     * Handles post-processing logic after attempting to send a password reset link.
     * Logs relevant information based on the outcome of the reset link sending process.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request containing the email address.
     * @param string $status The status returned after attempting to send the reset link.
     */
    protected function afterSendingResetLink($request, $status) {
        // Logique après envoi
        if ($status == Password::RESET_LINK_SENT) {
            Log::info('Lien de réinitialisation envoyé avec succès', [
                'email' => $request->email
            ]);
        } else {
            Log::warning('Échec envoi lien réinitialisation', [
                'email' => $request->email,
                'status' => $status
            ]);
        }
    }

}
