<?php

class Format extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'formats';

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
		Cache::forget('formats_id-name');
		Cache::forget('formats');
	}


	/**
	 * Get all formats
	 *
	 * @return array of formats
	 */
	public static function getAll()
	{
		return Mrcore\Cache::remember("formats", function()
		{
			return Format::orderBy('order')->get();
		});
	}


	/**
	 * Get all formats as array
	 *
	 * @return assoc array of formats
	 */
	public static function allArray($keyField = 'id', $valueField = 'name')
	{
		$function = function() use ($keyField, $valueField) {
			return Format::orderBy('order')->get()->lists($valueField, $keyField);
		};
		
		//Only cache if using default id/name
		if ($keyField == 'id' && $valueField == 'name') {
			return Mrcore\Cache::remember("formats_$keyField-$valueField", $function);
		} else {
			return $function;
		}
	}	
}