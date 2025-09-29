<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $authUser = User::updateOrCreate([
            'google_id' => $user->id,
        ], [
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'password' => bcrypt(str()->random(16)), // evita el error de columna vacía
        ]);

        Auth::login($authUser, true);

        return redirect()->route('dashboard');
    }

    public function authenticated(Request $request, $user)
    {
        $device = $request->header('User-Agent');
        $user->sessions()->create(['device' => $device]);

        return redirect()->route('dashboard');
    }
     // ============================
    // GITHUB LOGIN
    // ============================
    public function redirectToGithub()
    {
        // Pedir permiso para leer emails privados
        return Socialite::driver('github')->scopes(['read:user','user:email'])->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $authUser = User::where('github_id', $githubUser->getId())
            ->orWhere('email', $githubUser->getEmail())
            ->first();

        if ($authUser) {
            $authUser->update([
                'name'      => $githubUser->getName() ?? $githubUser->getNickname(),
                'email'     => $githubUser->getEmail(),
                'github_id' => $githubUser->getId(),
                'avatar'    => $githubUser->getAvatar(),
            ]);
        } else {
            if (!$githubUser->getEmail()) {
                return redirect()->route('login')
                    ->withErrors(['email' => 'GitHub no proporcionó tu email.']);
            }

            $authUser = User::create([
                'name'      => $githubUser->getName() ?? $githubUser->getNickname(),
                'email'     => $githubUser->getEmail(),
                'github_id' => $githubUser->getId(),
                'avatar'    => $githubUser->getAvatar(),
            ]);
        }

        Auth::login($authUser, true);

        return redirect()->route('dashboard');
    }
}

