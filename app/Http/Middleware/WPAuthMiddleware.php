<?php

namespace App\Http\Middleware;

use Closure;
use Log;


use App\User;  
/*user model
*/
use Illuminate\Support\Facades\Auth;

class WPAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	
    public function handle($request, Closure $next)
    {
    	include_once(env('WP_LOAD_PATH')."/wp-load.php");  
	
        $wp_user = wp_get_current_user();
			
        if ($wp_user->ID > 0) {
			
			$current_user = Auth::loginUsingId($wp_user->ID,true);
			$user = User::find($wp_user->ID);
			
        } else {
            Auth::logout();
            return redirect(env('WP_URL').'/wp-login.php');
        }
		
        return $next($request);
    }
}
