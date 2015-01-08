<?php

class Badge extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'badges';

	/**
	 * This table does not use automatic timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;


	/*
	 * Clear all cache
	 *
	 */
	public static function forgetCache()
	{
		Cache::forget('badges_id-name');
		Cache::forget('badges');
	}


	/**
	 * Get all badges
	 *
	 * @return array of badges
	 */
	public static function getAll()
	{
		return Mrcore\Cache::remember("badges", function()
		{
			return Badge::orderBy('name')->get();
		});
	}


	/**
	 * Get all badges as array
	 *
	 * @return assoc array of badges
	 */
	public static function allArray($keyField = 'id', $valueField = 'name')
	{
		$function = function() use ($keyField, $valueField) {
			return Badge::all()->lists($valueField, $keyField);
		};

		//Only cache if using default id/name
		if ($keyField == 'id' && $valueField == 'name') {
			return Mrcore\Cache::remember("badges_$keyField-$valueField", $function);
		} else {
			return $function;
		}
	}

}
