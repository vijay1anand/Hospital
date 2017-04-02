<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 16-Nov-16
 * Time: 3:07 AM
 */

                $dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

               
	?>	
<html>
<head></head>
  <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
         <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway"/>
         <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
         <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<body>	
div class="container">
    <div class="row">
        <table class="table table-striped">
    <thead>
      <tr>
        <th>Key Of Order</th>
        <th>Order</th>
        <th>Date of Order</th>
        <th>Time of Order</th>
        <th>Dish</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="block">
<?php
 $query="SELECT * FROM user_place_order ORDER BY date_of_order DESC, time_of_order DESC ";
                $result= mysqli_query($con,$query);
             if(mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
             
  $val=$row['key_order'];
                 echo "<tr>"
				 echo "<td>"
			     echo $row['key_order'];
				 echo "</td>"
       			 echo "<td>"
                $que="SELECT `dish_name`, `qty`, `price` FROM `order_menu` WHERE `key_order`=$val";
                $res= mysqli_query($con,$query);
             if(mysqli_num_rows($res)>0) {
                    while ($raw = mysqli_fetch_assoc($res)) {  
					 echo "<li>"
					 echo $raw[`dish_name`];
					 echo $raw[`qty`];
					 echo $raw[`price`];
					 echo "</li>"
					}
			     }					
                 echo "</td>";				 
				 echo "<td>";
				 echo $row['date_of_order'];
				 echo "</td>";
				 echo "</td>";
       			 echo "<td>";
			     echo $row['time_of_order'];
				 echo "</td>";
                 echo "</tr>";	
                    }
                }

?>
       
        
      
    </tbody>
  </table>
      
</body>
</html>