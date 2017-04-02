<?php
session_start();
if(isset($_POST['logout'])){
   //unset 
       session_unset();
        // destroy the session
        session_destroy();
        
          echo "<script type='text/javascript'>
                            alert('Logout Successfully');
                            window.location='index.php';
                 </script>";

 }
if(isset($_POST['submit'])){
$action=$_POST['activity'];
$username=$_SESSION['username_login'];
if($action=="login"){
  include 'model/login.php';
  $view=loginuser();
  echo $view;
}
if($action=="review"){
        include 'model/review.php';
        reviewset(); 
        
    }    
if(!is_null($username)){    
 
 if($action=="add_doctor"){
 include 'model/add_doctor.php';
     $view=adddoctor();
     header("Location: $view"); 
}

else if($action=="add_medicine"){
 include 'model/add_medicine.php';
    $view=addmedicine();
     header("Location: $view");
}    
else if($action=="delete"){
 include 'model/delete.php';
      $view=removedoctor();
     header("Location: $view");
 } 
else if($action=="deletemed"){
 include 'model/deletemed.php';
    $view=removemed();
    header("Location: $view");
 }     
else if($action=="update"){
 include 'model/update.php';
  updatedoctor();
    
  }
else if($action=="updatemed"){
 include 'model/updatemed.php';
  updatemed();
    }    
}
    else{
         echo "<script type='text/javascript'>
								alert('Admin Login Required');
								window.location='index.php';
							</script>";    
    }
}
?>    