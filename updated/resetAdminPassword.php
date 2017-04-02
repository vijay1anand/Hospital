<?php
session_start();

if(is_null($_SESSION['emailForOtp']))
{
  header('Location: home.php');
  exit();


}
else
{
  $emailOfAdmin=$_SESSION['emailForOtp'];

}

function logut()
{
  session_unset();
  // destroy the session
  session_destroy();



}
if(isset($_POST['logout']))
{
  //unset
  logut();
  echo "<script type='text/javascript'>
                            alert('Logout Successfully');
                            window.location='home.php';
                 </script>";

}
?>
<html>

<head>
  <title>Reset Password</title>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="utf-8" http-equiv="encoding">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script>

    function checkPasswordMatch()
    {
      var password = $("#txtNewPassword").val();
      var confirmPassword = $("#txtConfirmPassword").val();

      if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
      else
        $("#divCheckPasswordMatch").html("Passwords match.");
    }

    $(document).ready(function ()
    {
      $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });

  </script>

</head>
<body>

<?php
				$dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
				

                      

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <input type="submit" class="btn btn-danger" name ="logout" value="logut"/>

</form>
	<div class="container">
  <h2>Horizontal form</h2>
  <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" >

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="txtNewPassword" placeholder="Enter password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="txtConfirmPassword" placeholder="Re-Enter password" name="confirmPassword" onChange="checkPasswordMatch()" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <label class="control-label col-sm-2" for="pwd"></label>
         <div  id="divCheckPasswordMatch"></div></br>
        </div>
      </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name ="changed_password"class="btn btn-default" value="Update Password" class="btn btn-info"></input>
      </div>
    </div>
  </form>
</div>

<?php
if(isset($_POST['changed_password']))
{

  
  $password=$_POST['password'];
  $confirmPassword=$_POST['confirmPassword'];
  if($password==$confirmPassword)
  {

    $query="UPDATE admin_eggd SET password='$password' WHERE email = '$emailOfAdmin'";
    $result= mysqli_query($con,$query);
    logut();

    echo "<script type='text/javascript'>
                    alert('Password Sucssesfully changed , Now login with new password');
                            window.location='home.php';
                        </script>";

  }
  else
  {
    echo "Re-Try , Password didn't match";

  }


}

?>
</body>
</html>

