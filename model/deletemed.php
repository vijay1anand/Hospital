<?php
function removemed()
{
   include 'dataconn.php';
    $conn=database();
    if(isset($_POST['mname'])){
     
     $query="DELETE FROM `medicine` WHERE `m_name`='$_POST[mname]'";
            if (!$conn->query($query)) {
                                    echo "Error: ".$conn->error;
                                    return 0;
                          }
    else{
         //echo "deleted succesfully";
         return 'view/med_show.php';
        
        }
   }
} 
?>