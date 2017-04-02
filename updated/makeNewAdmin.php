<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 12-Nov-16
 * Time: 3:14 AM
 */
session_start();
?>
<?php
            $checkLoginForAdmin=$_SESSION['adminEmail'];
            if(is_null($checkLoginForAdmin))
            {
                echo  '<script>window.location="home.php"</script>';
            }

            else
            {
                echo "Welcome ".$checkLoginForAdmin;
            }

?>
<?php
if(isset($_POST['logout']))
{
    //unset
    session_unset();
    // destroy the session
    session_destroy();

    echo "<script type='text/javascript'>
                            alert('Logout Successfully');
                            window.location='home.php';
                 </script>";

}

?>
<html>
<head>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title> New Admin </title>


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
<div>
    <form method="post">
        <input type="submit" name="logout" value="logout" class="btn btn-danger btn-lg "/>
    </form>
</div>

<div class="container">
    <h2>Details for new admin</h2>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" >

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control"  placeholder="Enter email" name="email"  required>
            </div>
        </div>
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
            <label class="control-label col-sm-2" for="pwd">Phone No :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  placeholder="Phone" name="phone_no"  required>
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
                <input type="submit" name ="new_Admin" class="btn btn-success" value="Confirm New Admin" class="btn btn-info"/>
        </div>
        </div>
    </form>
</div>

<?php

		        $dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);



    if(isset($_POST['new_Admin']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        $phone_no=$_POST['phone_no'];
        if($password==$confirmPassword)
        {

            $query="INSERT INTO admin_eggd (email,password,phone_no) VALUES ('$email','$password','$phone_no')";
            $result= mysqli_query($con,$query);


            echo "<script type='text/javascript'>
                    alert('New Admin Successfully Added');
                            window.location='menu_admin.php';
                        </script>";

        }
        else
        {
            $prin= "Re-Try , Password didn't match";//use this varible to print in fronted

        }



    }

?>
<?php
    if(!is_null($prin))
    {
       echo $prin;
    }
?>



</body>
</html>

