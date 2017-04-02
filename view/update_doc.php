<?php
$drname=$_POST['drname'];
$speci=$_POST['speci'];
$degree=$_POST['degree'];
$jdate=$_POST['jdate'];
?>
<html>
    <head>
        <title>Add Doctor</title>
    </head>    
    <body>
<h1>Doctor Update</h1>

      <hr>
<form action="../controller.php" method="post">
<tr><td><label><b>Name</b></label></td>
<td><input type="text" name="drname" value="<?php echo $drname?>" readonly="readonly"></input></td>

</tr><br/><br/>
<tr><td><label><b>Spcialisation</b></label>
<td><input type="text" name="speci"  value="<?php echo $speci?>"></td></tr><tr>

</tr><br/><br/>
<tr><td><label><b>Degree</b></label></td>
<td><input type="text" name="avail" value="<?php echo $degree?>"></td></tr><tr></tr><tr>

</tr>
</tr><br/><br/>
<tr><td><label><b>Joining Date</b></label></td>
<td><input type=date name="jdate" value="<?php echo $jdate?>" readonly="readonly"></td></tr>

</tr><br/><br/>
    <tr><td><input type="hidden" id="activity" name="activity" value="update"><button type="submit" name="submit" id="submit" value="submit">Update</button></td></tr><br/>
<tr><a href="doct_view.php">Back</tr>
</form> 
</body>
</html>