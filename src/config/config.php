<?php

return array(

	'groups' => array(
		'default' => array(
			'salt' => 'salt_must_be_a_minimum_of_16',
			'min_length' => 7,
			'alphabet' => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
		),
		#define specific named settings
		'named' => array(
			'salt' => 'salt_must_be_a_minimum_of_16',
			'min_length' => 10,
			'alphabet' => '0123456789abcdefghijklmnopqrstuvwxyz'
		)
	)
);
