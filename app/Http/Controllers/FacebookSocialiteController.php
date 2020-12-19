<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\User;


class FacebookSocialiteController extends Controller
{
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('facebook')->stateless()->user();

            
           
      
            $finduser = User::where('social_id', $user->id)->first();
           
       
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/dashboard');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'national_id' => '',
                    'social_type'=> 'facebook',
                    'password' => ''
                ]);
     
                Auth::login($newUser);
               
      
                return redirect('/dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
