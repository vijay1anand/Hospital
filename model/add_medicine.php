<?php
function addmedicine(){
 include 'dataconn.php';
    $conn=database();
 if(isset($_POST['mname']) && isset($_POST['amount']) && isset($_POST['edate']) ){
     $mname=$_POST['mname'];
     $amount=$_POST['amount'];
     $edate=$_POST['edate'];

$query = "INSERT INTO `medicine`(`m_name`, `amount`, `edate`) VALUES     ('$_POST[mname]','$_POST[amount]','$_POST[edate]')";
         
    if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
  else{
	   return 'view/med_show.php';
    
   }    
  }
}
?>