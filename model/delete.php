<?php
function removedoctor()
{
 include 'dataconn.php';
    $conn=database();
    if(isset($_POST['remove']) && isset($_POST['jdate'])){
     $imname=$_POST['remove'];
     $jdate=$_POST['jdate'];
     $query="DELETE FROM `doctor` WHERE Dr_name='$imname' AND join_date='$jdate'";
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