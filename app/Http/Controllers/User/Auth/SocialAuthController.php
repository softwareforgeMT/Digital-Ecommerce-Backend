<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\SocialAccountService;
use Socialite;
use Auth;
class SocialAuthController extends Controller
{
    // Redirect function
    public function redirect($provider)
    {
      return Socialite::driver($provider)->redirect();
    }
    // Callback function
    public function callback(SocialAccountService $service, Request $request, $provider)
    {

      try {
          $user = $service->createOrGetUser(Socialite::driver($provider)->user(), $provider);

          // Return Error missing Email User
          if ( ! isset($user->id)) {
            return $user;
          } else {
            Auth::guard('web')->login($user);
          }

      } catch (\Exception $e) {
           return redirect()->route('user.login')->with('error', $e->getMessage());
      }

      return redirect()->intended(route('user.dashboard'));
    }// End callback

}//<-- End Class
