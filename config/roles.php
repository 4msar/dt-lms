<?php 

return [
	'admin' => [
		// TODO: add admin permission
		'books' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
		'branch' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
		'category' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
		'reservation' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
		'user' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
	],
	'manager' => [
		// TODO: add manager permission
		'books' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => false,
		],
		'branch' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => false,
		],
		'category' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
		'reservation' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
		'user' => [
			'list' => true,
			'add' => true,
			'edit' => true,
			'delete' => true,
		],
	],
	'user' => [
		// TODO: add user permission
		'books' => [
			'list' => true,
			'add' => false,
			'edit' => false,
			'delete' => false,
		],
		'branch' => [
			'list' => true,
			'add' => false,
			'edit' => false,
			'delete' => false,
		],
		'category' => [
			'list' => true,
			'add' => false,
			'edit' => false,
			'delete' => false,
		],
		'reservation' => [
			'list' => true,
			'add' => false,
			'edit' => false,
			'delete' => false,
		],
		'user' => [
			'list' => false,
			'add' => false,
			'edit' => false,
			'delete' => false,
		],
	],

];