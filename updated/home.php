<?php include 'data.php'; ?>
<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title> EggAff </title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="home_style.css">



</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid cf1">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="AboutUs.html">About us</a></li>
                <li><a href="menu_user.php">Menu</a></li>
                <li><a href="#contect" id="showpop">Contact</a></li>
                <li><a href="menu_user.php">Offers</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Login</a>

                    <div class="dropdown-menu">
                        <form id="formlogin" class="form container-fluid" action="userSignupLogin.php" method="post">
                            <div class="form-group">
                <li><a data-toggle="modal" href="#modalForLoginOfAdmin" data-dismiss="modal"
                       style="text-decoration:none;color: #0a253e;">AdminLogin</a>
                <li>
        </div>
        <div class="form-group">
            <li>
                <button type="button" class="btn btn-info btn-lg login" data-toggle="modal" data-target="#login"
                        style="background-color: #0a253e;">Login
                </button>
            </li>
        </div>
        <div class="form-group">

            <li>
                <button type="button" class="btn btn-info btn-lg signup" data-toggle="modal" data-target="#signup"
                        style="background-color: #0a253e; color: white;">sign up
                </button>
            </li>
        </div>
        </form>

    </div>

</nav>


<div class="container c1">
    <div>
        <a href="cancel_order.php" class="btn btn-info btn-lg pull-right" role="button">Cancel Order</a>
    </div>

    <div class="text">
        <p style="color:#0a253e;font-size:50px;">EggAfe
        <p>
    </div>
    <div class="text1">
        <a href="menu_user.php" style="font-size:20px;cursor:pointer;text-decoration:none;color:#0a253e;"> PLACE
            ORDER </a>
    </div>
</div>
<div class="container card-box">
    <div class="conatiner c11">
        popular dishes
    </div>
    <div class="row" id="block">

    </div>
</div>

<script>
    $(document).ready(function () {
        var a = 0;
        var text = "";
        $.getJSON('empdata.json', function (data) {
            $.each(data, function (key, value) {

                text += '<div class="col-md-3 col-xs-6 col-sm-4  col-lg-4">'
                    + '<div class="card" ><img src="images/' + data[a].image + '" alt="Avatar" style="width:100%;height:150px;"><div class="container layout">'
                    + '</div>'
                    + '<div class="container"><h4><b>' + data[a].pro_name + '</b></h4><p> Price - ' + data[a].price + '/Rs</p></div></div></div>'


                a++;

            });
            document.getElementById("block").innerHTML = text;
        });

    });
</script>
<!--------------------adminlogin code------------------------------------------------------------------------------------->


<div class="container">

    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div class="modal fade" id="modalForLoginOfAdmin" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="color:orange;">&times;</button>
                    <h2 class="modal-title" style="text-align:center;">AdminLogin</h2>
                </div>
                <div class="modal-body">

                    <form action="validationOfLoginAdmin.php" method="post">

                        <div>

                            <input type="email" name="email" placeholder="Email" value="" size="30" class="one"
                                   required/></br>
                        </div>
                        <div>

                            <input id="txtNewPassword" type="password" name="password" value="" placeholder="Password"
                                   class="two" required/>
                            </br>
                        </div>


                        <input type="submit" name="adminSignIn" value="Login" class="signup" style="color: white";/></br></br>
                    </form>
                </div>
                <div class="modal-footer">

                    <a data-toggle="modal" href="#modalForForgotPassword" data-dismiss="modal" style="color:orange;">
                        Forgot password </a>


                </div>
            </div>

        </div>

    </div>

</div>


<!---------------------------------------------------------------------------------------->


<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>-->

    <!-- Modal -->
    <div class="modal fade" id="modalForForgotPassword" role="dialog">

        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Details For OTP</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        EMAIL ID
                        <center><input type="email" name="emailForOtp" value="" size="20"></center>
                        </br>


                        <input type="submit" name="submitButtonForOtp" value="Request for Otp"/></br></br>
                    </form>


                </div>
                <div class="modal-footer">
                    <button id="btnForEnterotp" type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>


<!------------------------------------------------------------------------------------------------------------------->
<!--
            <div class="container">
              <h2>Small Modal</h2>       -->
<!-- Trigger the modal with a button -->
<!-- Modal -->
<!----            <div class="modal fade" id="forOtpModal" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>Enter Otp.</p>
                     <center><input   type="text" name="textBoxForOtp" value=""  size="6" ></center></br>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
      </div>          -->

<!-----------------------for forgot passwrod modal -->
<!----------modal for sign up---------------->
<div id="signup" class="modal fade" role="dialog">
    <div class="modal-dialog pm">

        <!-- Modal content-->
        <div class="modal-content m2">
            <div class="container modal-header mm">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h2>sign up</h2>
            </div>
            <div class="modal-body">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <!--
                        <label>Email Id</label> <input   type="email" name="email" value="" size="30" class="input3" required></br>
                    <label>Name </label> <input  type="text" name="username" value="" placeholder="username" class="input4" required /></br>
                <label>Password</label> <input  id="txtNewPassword" type="password" name="password" value="" placeholder="Password" class="input5" required/></br>
            <label>Confirm Password</label><input id="txtConfirmPassword"  type="password" name="confirmpassword"value="" placeholder="same as above" onChange="checkPasswordMatch()" class="input6" required></br>
            <div  id="divCheckPasswordMatch"></div></br>
<label>Phone Number </label><input   type="number" name="phone_no" value="" maxlength="10" class="input7" required></center></br>
     <label>Address</label><input   type="text" name="address" value="" class="input8" required></br>

                    <input   type="submit" name="signup" value="signup"/></br></br>
                    -->

                    <div class="conatiner c2">
                        <label>Email Id: </label><br>
                        <input type="email" name="email" value="" size="30" class="class1" required>
                        <br>
                    </div>

                    <div class="conatiner c2">
                        <label>Name: </label><br>
                        <input type="text" name="username" value="" placeholder="username" class="class3" required/>
                        <br>
                    </div>
                    <div class="conatiner c2">
                        <label>Password: </label><br>
                        <input id="txtNewPassword" type="password" name="password" placeholder="password"
                               value="" class="class2"/>
                        <br>
                    </div>
                    <div class="conatiner c2">
                        <label>Confirm Password: </label><br>
                        <input id="txtConfirmPassword" type="password" name="confirmpassword" value=""
                               placeholder="same as above"  required/>
                        <br>
                    </div>
                    <div id="divCheckPasswordMatch"></div>
                    <div class="conatiner c2">
                        <label>Phone Number: </label><br>
                        <input type="number" name="phone_no" value="" maxlength="10" class="input7" required>
                        <br>
                    </div>
                    <div class="conatiner c2">
                        <label>Address: </label><br>
                        <input type="text" name="address" value="" class="class3" required>
                        <br>
                    </div>

                    <div class="container c5">
                        <input type="submit" name="signup" value="signup" class="sub"/>
                    </div>


                </form>


            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>

    </div>
</div>
<!------------------------modal ends for signup-------------->

<!--------modal form login------------>
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content m1">
            <div class=" container modal-header mm">
                <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h2>Login</h2>
            </div>
            <div class="modal-body login">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="conatiner c2">
                        <label>Email: </label><br>
                        <input type="email" name="email" placeholder="email" class="class1" required>
                        <br>
                    </div>
                    <div class="conatiner c3">
                        <label>Password: </label><br>
                        <input type="password" name="password" placeholder="password" value="" class="class2" required>
                        <br>
                    </div>

                    <div class="container c5">
                        <input type="submit" name="login" value="Login" class="sub">
                    </div>
                </form>


            </div>
            <!--
                 <div class="modal-footer">

                            Not yet registered?
                        <button type="button" class="btn btn-info btn-lg btn-primary" data-toggle="modal" data-target="#myModal1" data-dismiss="modal">click here</button>
                    </p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>-->
        </div>

    </div>
</div>
<!-------------modal ends for login------------->


<?php
$dbhost = "localhost";
$dbuser = "id56287_softwareiiitv";
$dbpassword = "iiitvsoftware";
$dbname = "id56287_eggafe";

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

?>



<?php
$emailForOtp = "";
if (isset($_POST['submitButtonForOtp'])) {
    $emailForOtp = $_POST['emailForOtp'];
    $_SESSION['emailForOtp'] = $emailForOtp;


    if (mysqli_connect_errno()) {
        die("datbase coonection failed" . mysqli_connect_error());
    } else {


        $query = "SELECT email FROM admin_eggd Where email='$emailForOtp'";
        $result = mysqli_query($con, $query);


        if (mysqli_num_rows($result) > 0) {

            echo "
                            <div class='container'>
                              <!-- Modal -->
                              <div class='modal show'  role='dialog'>
                                <div class='modal-dialog modal-sm'>
                                  <div class='modal-content'>
                                    <div class='modal-header'>
                                      <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                      <h4 class='modal-title'>OTP DETAILS</h4>
                                    </div>
                                    <div class='modal-body'>
                                      <p>Enter Otp</p>
									  <form method='post'>
                                      <input type='password' name='textForOtp' value='' required>
                                      <input type='submit' name ='finalOtp' value='confirm otp'/>
									  </form>
                                    </div>
                                    <div class='modal-footer'>
                                      <button type='button'class='btn btn-default' data-dismiss='modal'>Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            ";

            generateOtp($emailForOtp);// bad me kholenge


        } else {

            echo "<script type='text/javascript'>
								alert('This email id is not used as admin');
							</script>";


        }

        //mysqli_close($con);
    }
}


function generateOtp($emailForOtp)
{


    $to = $emailForOtp;

    $subject = 'OTP for password change of admin';
    $str = '';

    $headers = "From : EggD<No_reply@eggD.com>";
    $otp_number = mt_rand(100000, 999999);
    $str = $str + $otp_number;

    /*  The above line concatenates one character at a time for
        seven iterations within the ASCII range mentioned.
        So, we get a seven characters random OTP comprising of
        all small alphabets.
    */

    $str = 'Your one time password is : ' . $str;

    mail($to, $subject, $str, $headers);
    session_start();
    $_SESSION['otpSess'] = $otp_number;
    echo "text sess at generateOtp " . $_SESSION['otpSess'];


}


?>


<?php
//$_SESSION['otpSess'];


?>

<!------for enter otp -->

<?php
$textForOtp = "";
if (isset($_POST['finalOtp'])) {
    //session_start();
    $textForOtp = $_POST['textForOtp'];

    echo "text " . $textForOtp;
    echo "text sess " . $_SESSION['otpSess'];
    if ($textForOtp == $_SESSION['otpSess']) {

        echo "<script type='text/javascript'>
                            window.location='resetAdminPassword.php';
                        </script>";
        //unset
        //  session_unset();
        // destroy the session
        //session_destroy();
        // echo     '<script>window.location="resetAdminPassword.php"</script>';


    } else {
        echo "<script type='text/javascript'>
								alert('otp not correct');
							</script>";


    }

}

?>


<!------------------finishes admin code--------------------------------------------------------------------------------------------------->


<div class="container footer" id="contect">
    <div class="footer-body">
        <address style="font-size:18px;padding-top:2%;">
            EggAFF.®</br>
            Reliance Chaukdi.</br>
            Gujrat,Gandhinagar</br>

            Phone: 9687977733

        </address>
    </div>
</div>

<!------------------------php code for login and signup-------------------------->


<?php
$username = $password = $phone_no = $email = "";
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['confirmpassword'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    session_start();

    $_SESSION['unameS'] = $username;
    $_SESSION['passwordS'] = $password;
    $_SESSION['pnumS'] = $phone_no;
    $_SESSION['emailS'] = $email;
    $_SESSION['addressS'] = $address;


    if (mysqli_connect_errno()) {
        die("datbase coonection failed" . mysqli_connect_error());
    } else {


        $query = "SELECT email,password FROM signup Where email='$email' ";
        $result = mysqli_query($con, $query);


        if (mysqli_num_rows($result) > 0) {

            echo "<script type='text/javascript'>
						alert('Email already Exists');
						window.location='home.php';
					</script>";

        } else {
            echo "
								<div class='container'>
								  <!-- Modal -->
								  <div class='modal show'  role='dialog'>
									<div class='modal-dialog modal-sm'>
									  <div class='modal-content'>
										<div class='modal-header'>
										  <button type='button' class='close' data-dismiss='modal'>&times;</button>
										  <h4 class='modal-title'>Modal Header</h4>
										</div>
										<div class='modal-body'>
										  <p>This is a small modal.</p>
										  <form method='post'>
										  <input type='password' name='textForOtp' value=''/>
										  <input type='submit' name='finalOtpSignup' value='confirm otp' />
										  </form>
										</div>
										<div class='modal-footer'>
										  <button type='button'class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									  </div>
									</div>
								  </div>
								</div>
								";

            generateOtp2();


        }
    }
}
?>



<?php
//sign up OTP

function generateOtp2()
{


    $to = $_SESSION['emailS'];

    $subject = 'OTP for password change';
    $str = '';

    $headers = "From : EggD<No_reply@eggD.com>";
    $otp_number = mt_rand(100000, 999999);
    $str = $str + $otp_number;

    /*  The above line concatenates one character at a time for
        seven iterations within the ASCII range mentioned.
        So, we get a seven characters random OTP comprising of
        all small alphabets.
    */

    $str = 'Your one time password is : ' . $str;

    mail($to, $subject, $str, $headers);
    session_start();
    $_SESSION['otpSess'] = $otp_number;


}


?>

<!------for enter otp -->

<?php
$textForOtp = "";
if (isset($_POST['finalOtpSignup'])) {
    session_start();
    $textForOtp = $_POST['textForOtp'];


    if ($textForOtp == $_SESSION['otpSess']) {
        session_start();
        $username = $_SESSION['unameS'];
        $password = $_SESSION['passwordS'];
        $phone_no = $_SESSION['pnumS'];
        $email = $_SESSION['emailS'];
        $address = $_SESSION['addressS'];

        $query = "INSERT INTO signup (username,password,phoneno,email,address) VALUES ('$username','$password','$phone_no','$email','$address')";
        $result = mysqli_query($con, $query);
        echo "<script type='text/javascript'>
                    alert('signup success');
					window.location='home.php';
                </script>";


    } else {
        echo "<script type='text/javascript'>
                            alert('otp not correct');
                        </script>";


    }

}


?>










<?php
$username = $password = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (mysqli_connect_errno()) {
        die("datbase coonection failed" . mysqli_connect_error());
    } else {
        $query = "SELECT username,email,password FROM signup Where email='$email' and password='$password'";
        $result = mysqli_query($con, $query);

        $row = mysqli_fetch_assoc($result);
        {

            if (mysqli_num_rows($result) > 0) {
                $username = $row["username"];
                $email = $row["email"];


                $_SESSION['username_login'] = $username;
                $_SESSION['email_login'] = $email;


                echo '<script>
                             alert("Login success")

                        window.location="menu_user_login.php"</script>';
                exit();

            } else {

                echo "<script type='text/javascript'>
								alert('Login Unsuccessful!!!');
								window.location='home.php';
							</script>";
            }

        }


    }

}
?>

<!-----------------ends code of php and login-------------->


</body>
</html>
