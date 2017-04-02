<?php 
session_start();
?>
<!-- connecntion established to database-->
        <?php
                $dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
?>



		<?php
		$password=$email="";
	if(isset($_POST['adminSignIn']))
		{
        $email=$_POST['email'];
		$password=$_POST['password'];
       
		
		
		
		
		
			if(mysqli_connect_errno())
			{
				die("datbase coonection failed" . mysqli_connect_error() );
			}
            else{
			
                    $query= "SELECT email,password FROM admin_eggd Where email='$email' and password='$password'";
                    $result= mysqli_query($con,$query);



                        if(mysqli_num_rows($result)>0)
                        {
							//$email=$row['email'];
							
							$_SESSION['adminEmail']="admin";
                        echo  '<script>window.location="menu_admin.php"</script>';
                            // "<script type='text/javascript'>
                            //alert('login succesfuull');
                        //</script>";

                        }	
                        else{
                            echo "<script type='text/javascript'>
                            alert('login unsuccesfuull');
							window.location='home.php';
                        </script>";
						
                               
                // header("Location: adminlogin.php"); /* Redirect browser */
                   //      exit();


                        }
            }
		}
		else
        {
            header("Location: home.php"); /* Redirect browser */
            //      exit();
        }

mysqli_close($con);
		

?>

