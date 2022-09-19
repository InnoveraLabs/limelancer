<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\SocialiteHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialLoginController extends Controller
{
    protected $userRepository;
    protected $socialiteHelper;

   	public function __construct(UserRepository $userRepository, SocialiteHelper $socialiteHelper)
   	{
   		$this->userRepository = $userRepository;
   		$this->socialiteHelper = $socialiteHelper;
   	}

   	public function login(Request $request, $provider){

   		// There is a high probability something will go wrong
   		$user = null;

   		// if the provider is not an acceptable third party than kick back
   		if (!in_array($provider, $this->socialiteHelper->getAcceptedProviders(), true)) {
   			return redirect()->route(home_route()->withFlashDanger('This Provider is not an acceptable login type', ['provider' => e($provider)]));
   		}

   		/*
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        if (!$request->all()) {
            return $this->getAuthorizationFirst($provider);
        }

        // Create the user if this is a new social account or find the one that is already there.
        try {
            $user = $this->userRepository->findOrCreateProvider($this->getProviderUser($provider), $provider);
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route(home_route())->withFlashDanger($e->getMessage());
        }

        if ($user === null) {
            return redirect()->route(home_route());
        }

        // // Check to see if they are active.
        // if (! $user->isActive()) {
        //     throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        // }

        // // Account approval is on
        // if ($user->isPending()) {
        //     throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
        // }

        // User has been successfully created or already exists
        auth()->login($user, true);

        // Set session variable so we know which provider user is logged in as, if ever needed
        // session([config('access.socialite_session_name') => $provider]);

        // event(new UserLoggedIn(auth()->user()));

        // Return to the intended url or default to the class property
        return redirect()->intended(route(home_route()));
    }

    /**
     * @param  $provider
     *
     * @return mixed
     */
    protected function getAuthorizationFirst($provider)
    {
        $socialite = Socialite::driver($provider);
        $scopes = empty(config("services.{$provider}.scopes")) ? false : config("services.{$provider}.scopes");
        $with = empty(config("services.{$provider}.with")) ? false : config("services.{$provider}.with");
        $fields = empty(config("services.{$provider}.fields")) ? false : config("services.{$provider}.fields");

        if ($scopes) {
            $socialite->scopes($scopes);
        }
        if ($with) {
            $socialite->with($with);
        }
        if ($fields) {
            $socialite->fields($fields);
        }

        return $socialite->redirect();
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    protected function getProviderUser($provider)
    {
        return Socialite::driver($provider)->user();
    }
}
