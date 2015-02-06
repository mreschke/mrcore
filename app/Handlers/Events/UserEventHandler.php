<?php namespace Mrcore\Handlers\Events;

use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Events\Dispatcher;

class UserEventHandler {

	/**
	 * Handle user login events.
	 */
	public function onUserLogin(Dispatcher $event)
	{
		// Application specific login code here
		$user = Auth::user();

		// Save users permissions into session
		$perms = $user->getPermissions();

		Session::put('user.admin', false);
		Session::put('user.perms', array());

		if (in_array('admin', $perms)) {
			//Super admin, don't save anything into user.perms, no need
			Session::put('user.admin', true);
		} else {
			Session::put('user.perms', $perms);
		}

		// Update last login date
		$user->login_at = Carbon::now();
		$user->save();
	}

	/**
	 * Handle user logout events.
	 */
	public function onUserLogout(Dispatcher $event)
	{
		// Application specific logout code here
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  Illuminate\Events\Dispatcher $events
	 * @return array
	 */
	public function subscribe(Dispatcher $events)
	{
		$events->listen('Mrcore\Modules\Auth\Events\UserLoggedIn', 'UserEventHandler@onUserLogin');
		$events->listen('Mrcore\Modules\Auth\Events\UserLoggedOut', 'UserEventHandler@onUserLogout');
	}

}