<?php

class Framework extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'frameworks';

	/**
	 * This table does not use automatic timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;


	/**
	 * Get all frameworks as array
	 *
	 * @return assoc array of frameworks
	 */
	public static function allArray($keyField = 'id', $valueField = 'name')
	{
		return Mrcore\Cache::remember("frameworks_$keyField-$valueField", function() use($keyField, $valueField)
		{
			return Framework::all()->lists($valueField, $keyField);
		});
	}

}