<?php

namespace Mrynk\L4Hashids;

use Hashids\Hashids;

class L4Hashids {

	private static $_config;
	private static $_groupSettings = array();
	private static $_instances = array();

	public function __construct( \Illuminate\Config\Repository $pConfig )
	{
		self::$_config = $pConfig;
		self::$_groupSettings = self::$_config->get('l4-hashids::groups');
	}

	public static function make( $pName )
	{
		if( !self::$_groupSettings[ $pName ] )
			throw new Exception( 'Hashids group config ('.$pName.') does\'t exists.'  );
		if( isset( self::$_instances[ $pName ] ) )
			return self::$_instances[ $pName ];

		$settings =  self::$_groupSettings[ $pName ];

		return self::$_instances[ $pName ] = new Hashids(
			array_get( $settings, 'salt',		self::$_config->get('app.key') ),
			array_get( $settings, 'min_length', 6 ),
			array_get( $settings, 'alphabet', 	false )
		);
	}

	public function __call( $pName, $pVars )
	{
		return call_user_func_array(
			array( self::make('default'), $pName ),
			$pVars
		);
	}

}