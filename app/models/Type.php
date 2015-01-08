<?php

class Type extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'types';

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
		Cache::forget('types_id-name');
		Cache::forget('types');
	}


	/**
	 * Get all types
	 *
	 * @return array of types
	 */
	public static function getAll()
	{
		return Mrcore\Cache::remember("types", function()
		{
			return Type::all();
		});
	}


	/**
	 * Get all types as array
	 *
	 * @return assoc array of types
	 */
	public static function allArray($keyField = 'id', $valueField = 'name')
	{
		$function = function() use ($keyField, $valueField) {
			return Type::all()->lists($valueField, $keyField);
		};
		
		//Only cache if using default id/name
		if ($keyField == 'id' && $valueField == 'name') {
			return Mrcore\Cache::remember("types_$keyField-$valueField", $function);
		} else {
			return $function;
		}
	}
}