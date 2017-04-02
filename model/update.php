<?php
function updatedoctor()
{
include 'dataconn.php';
    $conn=database();
if(isset($_POST['drname']) && isset($_POST['jdate']) && isset($_POST['speci']) && isset($_POST['avail'])){
    
     
$query="UPDATE `doctor` SET `Specalise`='$_POST[speci]',`degree`='$_POST[avail]' 
        WHERE `join_date`='$_POST[jdate]' AND `Dr_name`='$_POST[drname]'";
       
                            if (!$conn->query($query)) {
                                                        echo "Error: ".$conn->error;
                                                        return 0;
                                                        }
                                    else{
                                           echo "<script type='text/javascript'>
								alert('Doctor Updated');
								window.location='view/doct_view.php';
							</script>";
           
                       
								}
		   }
	 }	   
?>			