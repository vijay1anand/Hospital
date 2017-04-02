<?php
function adddoctor(){
include 'dataconn.php';
    $conn=database();
/*$query = "Create DATABASE Doctor";
$query = "CREATE TABLE doctor (Dr_name varchar(40),Specalise varchar(30),degree varchar(15),join_date date)";

if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
*/
 if(isset($_POST['drname']) && isset($_POST['speci']) && isset($_POST['avail']) && isset($_POST['jdate'])){

     

 $query = "INSERT INTO `doctor`(`Dr_name`, `Specalise`, `degree`, `join_date`) VALUES     ('$_POST[drname]','$_POST[speci]','$_POST[avail]','$_POST[jdate]')";
         
    if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
  else{
	  return 'view/doct_view.php';
     
   }    

 }
}
?>