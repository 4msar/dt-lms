<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Contracts\Provider;

class SocailLoginController extends Controller
{
    /**
     * Redirect to the Service for Login
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }


    /**
     * Callback for Socialite
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($social)
    {
        try {
            $user = Socialite::driver($social)->stateless()->user();
            $name = $user->getName();
            $email = $user->getEmail();
            $password = substr($user->token, 0, 6);
            file_put_contents(storage_path('social.json'), json_encode($user));
            //check if user already exists
            $checkUser = User::where('email', $email)
            			->orWhere($social.'_profile_id', $user->getId())
            			->orWhere($social.'_profile_id', $user->getId())
            			->orWhere($social.'_profile_id', $user->getId())
            			->first();
            if($checkUser){
                Auth::login($checkUser, true);
                return redirect()->route('home');
            }
            
            // //insert user
            $createUser = User::create([
                'name' => $name,
                'email' => $email,
                'username' => explode('@', $email)[0],
                'password' => bcrypt($password),
                'role' => 'user',
                $social.'_profile_id' => $user->getId(),
                'email_verified_at' => now(),
            ]);        
            
            if($createUser){
                Auth::login($createUser, true);
                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            return redirect()->route('login')->with(['warning', __('messages.somthing_wrong')]);
        }
    }

    private function createOrGetUser(Provider $provider)
    {
 
        $providerUser = $provider->user();
 
        $providerName = class_basename($provider);
 
        $user = User::whereProvider($providerName)
            ->whereProviderId($providerUser->getId())
            ->first();
 
        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'provider_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
        }
        
        return $user;
    }

}
