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
			'client_id'     => env('TWITTER_CLIENT_ID'),
			'client_secret' => env('TWITTER_CLIENT_SECRET')
		],

	]

];