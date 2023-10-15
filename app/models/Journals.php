<?php 

/**
 * users model
 */
class Journals extends Model
{ 
	public $errors = [];
	protected $table = "journals";

	protected $allowedColumns = [

		'id',
		'userID',
		'timeframe',
		'fullname',
		'strategy',
		'typeoforder',
		'pair',
		'image',
		'volume',
		'stoploss',
		'takeprofit',
		'entryprice',	
		'profit_loss',	
		'r_r_r',		
		'win_lose',
		'initial_balance',
		'current_balance',		
		'growth_lose',		
		'comment',
		'status',
		'date'		

	];

	 
	
}