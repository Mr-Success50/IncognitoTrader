<?php 

/**
 * home class
 */
class RiskManagementCalculator extends Controller
{
	
	public function index()
	{   
	    
     //_______________CLOSED_________________________
		$data['title'] = "Risk Management Calculator";

		$this->view('riskManagementCalculator',$data);
	}
	
}