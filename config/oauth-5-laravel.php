<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Twitter' => [
			'client_id'     => env('CONSUMER_KEY'),
			'client_secret' => env('CONSUMER_SECRET')
		],

	]

];