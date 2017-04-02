<?php
$med=$_POST['mname'];
$amount=$_POST['amount'];
$edate=$_POST['edate'];
?>
<html>
    <head>
        <title>Add Doctor</title>
    </head>    
    <body>
<h1>Medicine Update</h1>

      <hr>
 <form action="../controller.php" name="Medicine" method="post">
<tr><td><label><b>Name of Medicine</b></label></td>
<td><input type="text" name="mname" value="<?php echo $med;?>" readonly="readonly"></td>
</tr><tr></tr><tr><br/><br/>
</tr>
 
<tr><td><label><b>Amount of Medicine</b></label></td>
<td><input type="int" name="amount" value="<?php echo $amount;?>"></td>
</tr><tr></tr><tr><br/><br/>
</tr>   
<tr><td><label><b>Expiry Date</b></label></td>
<td><input type="date" name="edate" value="<?php echo $edate;?>"></td></tr><tr></tr><tr>
</tr><br/><br/>
 
        
    <tr><td><input type="hidden" id="activity" name="activity" value="updatemed"><button type="submit" name="submit" id="submit" value="submit">Update</button></td></tr>

    <br/>
   <tr><a href="med_show.php">Back</tr>
	</form>	
</body>
</html>