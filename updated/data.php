<?php
  $dish="";
  $in=array();
        
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
//echo "Connected successfully";
    $sql = "SELECT * FROM menu";
           $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
    // output data of each row
                 $emparray = array();
                 while($row = $result->fetch_assoc())
                     {    
                         $emparray[] = $row;
                           
                         }
                      $fp = fopen('empdata.json', 'w');
                      fwrite($fp, json_encode($emparray));
                      fclose($fp);
                      
                
                 }else
            {
    echo "No items are Present in menu";
}

            
$conn->close();

?>

