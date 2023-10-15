<?php 

/**
 * Sign Out class
 */
class Logout extends Controller
{
	
	public function index()
	{
        Auth::signout();
        redirect('home');
	}
	
}