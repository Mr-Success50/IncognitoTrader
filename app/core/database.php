<?php 


/**
 * database class
 */
class Database
{ 

	private function connect()
	{
	    $str = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;
	    return new PDO($str,DBUSER,DBPASS); 

	}

	public function connect2()
	{
	    $con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME); 
        if ($con->connect_error) {
	         die("Connection failed: " .  $con->connect_error);
        } 
		return $con;
	}

	public function query($query,$data = [],$type = 'object')
	{
		$con = $this->connect();

		$stm = $con->prepare($query);
		if($stm)
		{
			$check = $stm->execute($data);
			if($check)
			{
				if($type == 'object')
				{
					$type = PDO::FETCH_OBJ;
				}else{
					$type = PDO::FETCH_ASSOC;
				}

				$result = $stm->fetchAll($type);

				if(is_array($result) && count($result) > 0)
				{
					return $result;
				}
			}
		}

		return false;
	}
   
	public function create_user_table()
	{
		//users table
		$query = "
		CREATE TABLE IF NOT EXISTS `users` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`email` varchar(100) NOT NULL,
			`phone` varchar(20) NOT NULL,
			`firstname` varchar(30) NOT NULL,
			`lastname` varchar(30) NOT NULL, 
			`password` varchar(255) NOT NULL,
			`role` varchar(20) NOT NULL,
			`datetime` datetime DEFAULT NULL,
			`image` varchar(1024) NULL,
			`bio` varchar(100) NULL, 
			PRIMARY KEY (`id`),
			KEY `email` (`email`),
			KEY `phone` (`phone`),
			KEY `firstname` (`firstname`),
			KEY `lastname` (`lastname`),
			KEY `datetime` (`datetime`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
		";

		$this->query($query);
	}

	public function create_journals_table()
	{
		//users table
		$query = "
		CREATE TABLE IF NOT EXISTS `journals` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`userID` int(11) NOT NULL,
		    `timeframe` varchar(20) NOT NULL,
		    `fullname` varchar(50) NOT NULL,
		    `strategy` varchar(40) NOT NULL,
		    `typeoforder` varchar(10) NOT NULL,
			`pair` varchar(20) NOT NULL,
			`image` varchar(1025) NULL, 
			`volume` varchar(20) NOT NULL, 
			`stoploss` varchar(20) NOT NULL,   
			`takeprofit` varchar(20) NOT NULL,   
			`entryprice` varchar(20) NOT NULL,   
			`profit_loss` varchar(20) NOT NULL,   
			`r_r_r` varchar(10) NOT NULL,   
			`win_lose` varchar(10) NOT NULL,   
			`initial_balance` varchar(20) NOT NULL, 
			`current_balance` varchar(20) NOT NULL,
			`growth_lose` varchar(20) NOT NULL,   
			`comment` varchar(300) NOT NULL,
			`status` varchar(10) NOT NULL,
			`date` date DEFAULT NULL,  
			PRIMARY KEY (`id`),
			KEY `userID` (`userID`),
			KEY `status` (`status`),
			KEY `date` (`date`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
		";

		$this->query($query);
	}

	
}