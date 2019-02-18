<?php 

/* This is the role & permission file.
 * here to set permission to a user role.
 * the first array is the role name.
 * the second array is the Controller name.
 * the third array is the action/method name.
 * and the value is the permission.
 * if the value is true then the role have the right permission.
 * if the value is false then the have not right permission to access this.
 */

return [
	// README: Remember if you create any custom Controller@method then add this here.
	
	'admin' => [
		'HomeController' => [
			'index' => true
		],
		'BookController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => true,
		],
		'BranchController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => true,
		],
		'CategoryController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => true,
		],
		'ReservationController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => true,
		],
		'UserController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => true,
		],
	],

	'manager' => [
		'HomeController' => [
			'index' => true
		],
		'BookController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => false,
		],
		'BranchController' => [
			'index' => true,
			'create' => false,
			'store' => false,
			'show' => true,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
		'CategoryController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => false,
		],
		'ReservationController' => [
			'index' => true,
			'create' => true,
			'store' => true,
			'show' => true,
			'edit' => true,
			'update' => true,
			'destroy' => true,
		],
		'UserController' => [
			'index' => true,
			'create' => false,
			'store' => false,
			'show' => true,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
	],

	'user' => [
		'HomeController' => [
			'index' => true
		],
		'BookController' => [
			'index' => true,
			'create' => false,
			'store' => false,
			'show' => true,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
		'BranchController' => [
			'index' => true,
			'create' => false,
			'store' => false,
			'show' => false,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
		'CategoryController' => [
			'index' => true,
			'create' => false,
			'store' => false,
			'show' => true,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
		'ReservationController' => [
			'index' => true,
			'create' => false,
			'store' => false,
			'show' => true,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
		'UserController' => [
			'index' => false,
			'create' => false,
			'store' => false,
			'show' => false,
			'edit' => false,
			'update' => false,
			'destroy' => false,
		],
	],

];