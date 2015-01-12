<?php namespace Mrcore\Auth;

use Illuminate\Hashing\HasherInterface;
use Illuminate\Auth\UserProviderInterface;
use Illuminate\Auth\UserInterface;
use Cache;

/**
 * See http://laravel.io/forum/02-06-2014-cache-authuser
 * See http://laravel.io/bin/6z0bj#19
 */
class CachedEloquentUserProvider implements UserProviderInterface {

	/**
	 * The hasher implementation.
	 *
	 * @var \Illuminate\Hashing\HasherInterface
	 */
	protected $hasher;

	/**
	 * The Eloquent user model.
	 *
	 * @var string
	 */
	protected $model;

	/**
	 * Create a new database user provider.
	 *
	 * @param HasherInterface $hasher
	 * @param                 $model
	 */
	public function __construct(HasherInterface $hasher, $model)
	{
		$this->model = $model;
		$this->hasher = $hasher;
	}

	/**
	 * Retrieve a user by their unique identifier.
	 *
	 * @param  mixed  $identifier
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	public function retrieveById($identifier)
	{
		$model = $this->createModel();

		return Cache::remember('userById_' . $identifier, 60,
			            function () use ($model, $identifier) {

				            return $model->newQuery()->find($identifier);
			            }
		);
	}

	/**
	 * Retrieve a user by their unique identifier and "remember me" token.
	 *
	 * @param  mixed  $identifier
	 * @param  string  $token
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	public function retrieveByToken($identifier, $token)
	{
		$model = $this->createModel();

		return Cache::remember('userByIdAndToken_' . $identifier . $token, 60,
			            function () use ($model, $identifier, $token) {

				            return $model->newQuery()
				                         ->where($model->getKeyName(), $identifier)
				                         ->where($model->getRememberTokenName(), $token)
				                         ->first();
			            }
		);
	}

	/**
	 * Update the "remember me" token for the given user in storage.
	 *
	 * @param  \Illuminate\Auth\UserInterface  $user
	 * @param  string  $token
	 * @return void
	 */
	public function updateRememberToken(UserInterface $user, $token)
	{
		$user->setRememberToken($token);

		$user->save();
	}

	/**
	 * Retrieve a user by the given credentials.
	 *
	 * @param  array  $credentials
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	public function retrieveByCredentials(array $credentials)
	{
		// First we will add each credential element to the query as a where clause.
		// Then we can execute the query and, if we found a user, return it in a
		// Eloquent User "model" that will be utilized by the Guard instances.
		$query = $this->createModel()->newQuery();

		foreach ($credentials as $key => $value)
		{
			if ( ! str_contains($key, 'password')) $query->where($key, $value);
		}

		return $query->first();
	}

	/**
	 * Validate a user against the given credentials.
	 *
	 * @param  \Illuminate\Auth\UserInterface  $user
	 * @param  array  $credentials
	 * @return bool
	 */
	public function validateCredentials(UserInterface $user, array $credentials)
	{
		$plain = $credentials['password'];

		return $this->hasher->check($plain, $user->getAuthPassword());
	}

	/**
	 * Create a new instance of the model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function createModel()
	{
		$class = '\\'.ltrim($this->model, '\\');

		return new $class;
	}

}
