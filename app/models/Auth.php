<?php 

/**
 * Authenticate model
 */
class Auth
{
	 
public static function authenticate($row)
{
    if(is_object($row)){
        $_SESSION['USER_DATA'] = $row;
    }
}

public static function signout()
{
    if(!empty($_SESSION['USER_DATA'])){
        unset($_SESSION['USER_DATA']); 
        

        //session_unset();
        //session_regenerate_id(true);
    }
}
 
public static function signed_in()
{
    if(!empty($_SESSION['USER_DATA']))
    {
        return true;
    }

    return false;
}

public static function is_admin()
{
    if(!empty($_SESSION['USER_DATA']))
    {
        if($_SESSION['USER_DATA']->role == 'admin'){
            return true;
        } 
    }

    return false;
}

public static function getUser_id()
{
    if(!empty($_SESSION['USER_DATA']))
    {
        $user_id = $_SESSION['USER_DATA']->id;
        return $user_id;   
    }

    return false;
} 

public static function getUserInfo(){  
    $user_id = $_SESSION['USER_DATA']->id;
    $query ="SELECT * FROM `users` WHERE id = '$user_id' limit 1"; 
    $db = new Database();
    $con = $db->connect2();
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }  
    return $row;
}


	
}

 