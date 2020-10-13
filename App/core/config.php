<?php

return [
	'db' => [
		'host' => 'localhost',
		'dbname' => 'testovoe_blog',
		'login' => 'root',
		'password' => ''

	],
	'routes' => [
		'~message/([0-9]+)~' => 'message/viewById/$1',
		'~messages~' => 'message/viewAll',
		'~user/register~' => 'user/register',
		'~user/singin~' => 'user/singin',
		'~message/add~' => 'message/add'


	]

];