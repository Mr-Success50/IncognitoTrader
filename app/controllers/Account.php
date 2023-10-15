<?php

/**
 * home class
 */
class Account extends Controller
{ 
	public function index()
	{ 
		//Redirect to login page if not logged-in._______ 
		if(!Auth::signed_in()){ redirect('login');}
	    //Redirect... CLOSED.__________________
	   

		//________General | PROPERTY____________ 
	    //Create empty variables, to avoid "undefined variable" error 
		$currentUserId = $id ?? Auth::getUser_id();  
		$todays_date = date("Y-m-d"); 
		$allErrorMsg  = ""; 
		$data['activeSignal'] = "";
//________Instanciate all Classes | PROPERTY________________________             
		$user = new User();         
		$model = new Model();    
		$journals = new Journals();    
		
		//Create all dataBase 
        $journals->create_journals_table();

		//________Tab selector | PROPERTY________________________    
		if($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['status']))
		{
			$data['activeTab'] = $_GET['status'];
		}else{
			$data['activeTab'] = "dashboard";
	    }

//________Profile Edit- GENERAL | PROPERTY________________________    
$data['row'] = $row = $user->firstItem(['id'=>$currentUserId]); 
if($_SERVER['REQUEST_METHOD'] == "POST" && $row && $_POST['sig']== 'edit-profile')
{
	
	$folder = "uploads/images/";
	if(!file_exists($folder))
	{
		mkdir($folder,0777,true);
		file_put_contents($folder."index.php", "<?php //silence");
		file_put_contents("uploads/index.php", "<?php //silence");
	}

	$allowed = ['image/jpeg','image/png'];

	if(!empty($_FILES['image']['name'])){

		if($_FILES['image']['error'] == 0){

			if(in_array($_FILES['image']['type'], $allowed))
			{
				//everything good
				$destination = $folder.time().$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], $destination);

				$_POST['image'] = $destination;
				
			}else{
				$allErrorMsg = "This file type is not allowed!";
			}
		}else{
			$allErrorMsg = "Could not upload image";
		}
	}

	 $user->update($currentUserId,$_POST);
	 if(empty($allErrorMsg)){
		message("Your profile was updated successfuly!");
		redirect('account'); 
	 } 
}

		//________Record Journal | PROPERTY_________  
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'journalToday')
		{   
		    /* The code snipet to enable image upload...
			$folder = "uploads/images/";
	if(!file_exists($folder))
	{
		mkdir($folder,0777,true);
		file_put_contents($folder."index.php", "<?php //silence");
		file_put_contents("uploads/index.php", "<?php //silence");
	}

	$allowed = ['image/jpeg','image/png'];

	if(!empty($_FILES['image']['name'])){

		if($_FILES['image']['error'] == 0){

			if(in_array($_FILES['image']['type'], $allowed))
			{
				//everything good
				$destination = $folder.time().$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], $destination);

				$_POST['image'] = $destination;
				
			}else{
				$allErrorMsg = "This file type is not allowed!";
			}
		}else{
			$allErrorMsg = "Could not upload image";
		}
	}
	*/
		    $_POST['userID'] = $currentUserId;
		    $_POST['fullname'] = Auth::getUserInfo()['firstname'].' '.Auth::getUserInfo()['lastname'];
		    $_POST['status'] = "private";
		    $_POST['date'] = $todays_date;
			$result = $journals->insert($_POST);
			if(empty($allErrorMsg)){
				message("Your Today Trade Has successfuly Been Recorded");
				redirect('account'); 
			 } 
		}
  //________________________________________________
  
  //________View Journal | PROPERTY_________  
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'journalViewerSSDR')
		{   $data['activeTab'] = "performMatrics";
			$data['journalViewer'] = $journals->getAllData_TimeSpec_forThisUser($currentUserId,$_POST['startDate'],$_POST['endDate']);
			$data['journalViewerHeader'] = 'Trading Journal For'.' '.$_POST['startDate'].' '.'To'.' '.$_POST['endDate'];
			//on no-errors
			//message("Your success message");
			//redirect('account');
		}else{
			$data['journalViewerHeader'] = 'All Time Trading Journals';
			$data['journalViewer'] = $journals->getAllItems_forThisUser($currentUserId);
		}
	
	  //________View Public Journal | PROPERTY_________ 
	   $data['journalPublicViewer'] = $journals->getPublicJournal();

      //________ShareJournal | PROPERTY_________  
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'hideShowJournal')
		{
            $journals->shareJournal($_POST,$currentUserId);
	        if(empty($allErrorMsg)){
	   	    message("Your Journal is published live successfuly!");
		    redirect('account'); 
	        }  
       }
       
       if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'editSingleJournal')
		{
		    $data['getModifyJournal'] = $journals->getOneDataByID($_POST['postID']);
			$data['activeTab'] = "performMatrics";
			$data['activeSignal'] = "EditingSingleJournal";
		}


		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'editSingleJournal_action')
		{
			$journals->update($_POST['postID'],$_POST);
			message("You successfully modified your journal!");
			redirect('account');
		}
	
	    $data['manageUserHeader'] = "Manage Users And Admin";
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'editUserDetails')
		{
			$data['specificUserID'] = $_POST['userID'];
			$data['activeTab'] = "manageUsers";
		    $data['manageUserHeader'] = "Take Actions";

		}

		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['sig']== 'editUserDetails_action')
		{
			//show($_POST);die;
			$user->update($_POST['userID'],$_POST);
			message("You successfully updated a user info!");
			redirect('account');

		}
	
	
        $data['allUsersInfo'] = $user->getAllItems();
        $data['errMsg']  = $allErrorMsg;    
	    $data['userInfo'] = Auth::getUserInfo();
		$data['title'] = "Account";   
		$this->view('account',$data); 
	}
	
}