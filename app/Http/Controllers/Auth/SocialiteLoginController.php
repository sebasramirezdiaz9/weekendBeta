<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {

        $social_user = Socialite::driver($provider)->stateless()->user();

        if ($user = User::where('email', $social_user->email)->first()) {
            return $this->authAndRedirect($user);
        } else {

            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
                'photo' => $social_user->avatar,
                'user_type_id' => 3,
            ]);
          
            return $this->authAndRedirect($user);
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/admin');
    }
}
