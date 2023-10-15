<?php 

/**
 * main model class
 */
class Model extends Database
{
	
	protected $table = "";

	public function insert($data)
	{

		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into " . $this->table;
		$query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

		$this->query($query,$data);

	}

	public function where($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res;
		}

		return false;

	}

	public function firstItem($data)
	{
        $keys = array_keys($data); 

        $query = "select * from ".$this->table." where ";
        foreach ($keys as $key){
            $query .= $key . "=:" . $key . " && "; 
        }

        $query = trim($query,"&& ");
        $query .= " order by id desc limit 1"; 
        $result = $this->query($query,$data); 
        
        if(is_array($result))
        {
            return $result[0];
        }
        return false;
	}

	 
	public function update($id,$data)
	{ 
		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update ".$this->table." set ";

		foreach ($keys as $key) {
			$query .= $key ."=:" . $key . ","; 

		}

		$query = trim($query,",");
		$query .= " where id = :id ";
		
		$data['id'] = $id;
		$this->query($query,$data); 
	}

	//!!!!!Using
	public function shareJournal($data,$userID)
	{
	    $newdata = $data['status'];
		$query = "UPDATE `journals` SET `status` = '$newdata' WHERE `journals`.`userID` = '$userID'";
		$con = $this->connect2();
        $result = mysqli_query($con,$query);
		return $result;
	}

	//__Recreate this queries !!!!!!!!!!!___________ 
	public function callAdmins()
	{   
        $query = "select * from ".$this->table." where role = 'admin'";   
        $query = trim($query,"&& ");
        $query .= " order by id desc"; 
        $con = $this->connect2();
        $result = mysqli_query($con,$query);  
		return $result;
	}

	public function callUsers()
	{   
        $query = "select * from ".$this->table." where role = 'user'";   
        $query = trim($query,"&& ");
        $query .= " order by id desc"; 
        $con = $this->connect2();
        $result = mysqli_query($con,$query);  
		return $result;
	} 
	//__________CLOSED_____!!!!!!!!!!!___________

	public function flush_data($data)
	{   
		$table = $data['category'];
		$id = $data['dataID'];
        $query = "delete from ".$table." where id = '$id'";   
        $query = trim($query,"&& "); 
        $con = $this->connect2();
        $result = mysqli_query($con,$query);   
	} 

		//!!!!!Using
		public function getAllItems()
		{   
			$query = "select * from ".$this->table." ";   
			$query = trim($query,"&& ");
			$query .= " order by id desc"; 
			$con = $this->connect2();
			$result = mysqli_query($con,$query);  
			return $result;
		}

		public function getAllItems_forThisUser($thisUser)
		{   
			$query = "select * from ".$this->table." where userID = '$thisUser'";   
			$query = trim($query,"&& ");
			$query .= " order by id desc"; 
			$con = $this->connect2();
			$result = mysqli_query($con,$query);  
			return $result;
		}

		
   public function getAllData_TimeSpec_forThisUser($thisUser,$from,$to)
	{   
        $query = "select * from ".$this->table." where userID = '$thisUser'
		 and date between '$from' and '$to'";
        $con = $this->connect2();
        $result = mysqli_query($con,$query);  
		return $result;
	}

	public function getAllData_TimeSpec($from,$to)
	{   
        $query = "select * from ".$this->table." where and date between '$from' and '$to'";
        $con = $this->connect2();
        $result = mysqli_query($con,$query);  
		return $result;
	}
		
   public function getPublicJournal()
	{   
        $query = "select * from ".$this->table." where status = 'public'";   
        $query = trim($query,"&& ");
        $query .= " order by id desc"; 
        $con = $this->connect2();
        $result = mysqli_query($con,$query);  
		return $result;
	} 
	
	//!!!!!Using
	public function getOneDataByID($id)
	{   
        $query = "select * from ".$this->table." where id = '$id'";   
        $query = trim($query,"&& ");
        $query .= " limit 1"; 
        $con = $this->connect2();
        $result = mysqli_query($con,$query);  
		return $result;
	}

}