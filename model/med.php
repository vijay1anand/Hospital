<?php
  $dish="";
  $in=array();
    include 'dataconn.php';
    $conn=database(); 
//echo "Connected successfully";
    $sql = "SELECT * FROM medicine";
           $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
    // output data of each row
                 $emparray = array();
                 while($row = $result->fetch_assoc())
                     {    
                         $emparray[] = $row;
                           
                         }
                      $fp = fopen('meddata.json', 'w');
                      fwrite($fp, json_encode($emparray));
                      fclose($fp);
                      
                
                 }else
            {
    echo "No items are Present in menu";
}

            
$conn->close();

?>

