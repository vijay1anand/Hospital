<?php
function updatemed()
{
     include 'dataconn.php';
     $conn=database();
if(isset($_POST['mname']) && isset($_POST['amount']) && isset($_POST['edate'])){
    
     
$query="UPDATE `medicine` SET `amount`='$_POST[amount]',`edate`='$_POST[edate]' 
        WHERE `m_name`='$_POST[mname]'";
       
                            if (!$conn->query($query)) {
                                                        echo "Error: ".$conn->error;
                                                        return 0;
                                                        }
                                    else{
                                            echo "<script type='text/javascript'>
								alert('Medicine Updated');
								window.location='view/med_show.php';
								</script>";
								   
							
           
                         }
		   }
	 }	   
?>			