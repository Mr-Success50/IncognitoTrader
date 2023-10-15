<?php 

/**
 * login class
 */
class Login extends Controller
{
	
	public function index()
	{
		$data['errors'] = [];  
		$data['title'] = "Sign In";  
		$user = new User(); 
		if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
			$row = $user->firstItem(['email'=>$_POST['email'],]);
            $user = new User();
			if(password_verify($_POST['password'], $row->password)){
				//authenticate
				Auth::authenticate($row); 
				redirect('account');
			}
			$data['errors']['email'] = "Wrong email or password";  
		}

		$data['title'] = "Login"; 
		$this->view('login',$data);
	}
	
}