<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();

        if( $user )
        {
        	$isExistingUser = User::where('email', $user->getEmail())->first();
        	if( $isExistingUser )
        	{
	        	Flash::info('You have already an account with us. Please login instead.');
	        	return redirect('/login');	
        	}

        	$newUser = User::create([
        		'name'	=> $user->getName(),
        		'email'	=> $user->getEmail(),
        		'password'	=> bcrypt($user->getEmail())
        	]);

        	Auth::login($newUser);
        	Flash::success('Welcome ' . $newUser->name . ', thank you for signing up to us.');

        	return redirect()->route('countries');
        }

    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        if( $user )
        {
        	$isExistingUser = User::where('email', $user->getEmail())->first();
        	if( $isExistingUser )
        	{
	        	Flash::info('You have already an account with us. Please login instead.');
	        	return redirect('/login');	
        	}

        	$newUser = User::create([
        		'name'	=> $user->getName(),
        		'email'	=> $user->getEmail(),
        		'password'	=> bcrypt($user->getEmail())
        	]);

        	Auth::login($newUser);
        	Flash::success('Welcome ' . $newUser->name . ', thank you for signing up to us.');

        	return redirect()->route('countries');
        }

    }
}
