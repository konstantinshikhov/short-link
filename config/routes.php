<?php

$routes = [
	'/'         => 'Controllers\URLController@index',
	'/url-store'         => 'Controllers\URLController@store',
	'/url/:any' => 'Controllers\URLController@show',

];