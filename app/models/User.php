<?php 

/**
 * users model
 */
class User extends Model
{ 
	public $errors = [];
	protected $table = "users";

	protected $allowedColumns = [

		'id',
		'firstname',
		'lastname',
		'email',
		'phone',
		'password',
		'image',
		'role',
		'bio',
		'date'	

	];

	 
	
}