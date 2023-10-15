<?php 

/**
 * home class
 */
class Home extends Controller
{
	
	public function index()
	{   
	    
     //_______________CLOSED_________________________
		$data['title'] = "Home";

		$this->view('home',$data);
	}
	
}