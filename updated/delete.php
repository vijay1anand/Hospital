<?php
if(isset($_POST['remove'])){
$dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $conn= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);


// Check connection
    if ($conn->connect_error) 
        {
             die("Connection failed: " . $conn->connect_error);
           } 
 
            
             $imname=$_POST['remove'];
             echo $imname;
            $query="DELETE FROM `menu` WHERE pro_name='$imname'";
            if (!$conn->query($query)) {
                                    echo "Error: ".$conn->error;
                                    return 0;
                          }
    else{
         //echo "deleted succesfully";
         header('Location: menu_admin.php');
    
      }
   }
?>