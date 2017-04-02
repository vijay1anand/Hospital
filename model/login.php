<?php

function loginuser(){ 
include 'dataconn.php';
    $con=database();
session_start();
              
/*$query = "CREATE TABLE login (username varchar(40),password varchar(30))";

if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }    
*/			
 if(isset($_POST['name']) && isset($_POST['password'])){
        $name=$_POST['name'];
		$password=$_POST['password'];	
	$user=$pass="";
	
		if(mysqli_connect_errno())
			{
				die("datbase coonection failed" . mysqli_connect_error() );
			}
			else
			{
				$query= "SELECT username,password FROM `login` Where username='$name' and password='$password'";
				$result= mysqli_query($con,$query);
			
				$row=mysqli_fetch_assoc($result);
				{
					
					if(mysqli_num_rows($result)>0)
					{
						$user=$row["username"];
						$pass=$row["password"];
						
						
						$_SESSION['username_login']=$user;
						$_SESSION['password_login']=$pass;
						
						
					
					return "<script>
                    alert('Login Successful');
                    window.location='hospital.php';</script>";
						exit();
						
					}
                
					else
					{
					
						return "<script type='text/javascript'>
								alert('Login Unsuccessful!!!');
								window.location='index.php';
							</script>";
					}
					
                  }
				}
				
				
			}
			
}
      

?>

			
			
