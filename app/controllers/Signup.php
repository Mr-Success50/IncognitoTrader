<?php 

/**
 * signup class
 */
class Signup extends Controller
{
	
	public function index()
	{  
	    //__________________________________
	    
		$user = new User(); 
		$user->create_user_table();
		$data['errors'] = [];  
		if ($_SERVER['REQUEST_METHOD'] == "POST"){  
              $_POST['role'] = 'user'; 
			  $_POST['datetime'] = date("Y-m-d"); //d H:i:s");
			  $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			  $user->insert($_POST); 
			  message("Your profile was successfuly created, please login.");
			  redirect('login');
		   

		   $data['errors'] = $user->errors; 
        }
 
		  
		$data['title'] = "Signup"; 
		$this->view('signup',$data);
	}
	
}