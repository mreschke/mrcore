<?php

/*
Mode is viewmode, and I liked table name of Views instead of 
View class is already used by laravel
*/
class Mode extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'modes';

	/**
	 * This table does not use automatic timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Get all modes as array
	 *
	 * @return assoc array of modes
	 */
	public static function allArray($keyField = 'id', $valueField = 'name')
	{
		return Mrcore\Cache::remember("modes_$keyField-$valueField", function() use($keyField, $valueField)
		{
			return Mode::all()->lists($valueField, $keyField);
		});
	}
}