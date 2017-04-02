<?php 
session_start();
?>

<html>
         <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
       <title>order</title>
    </head>
    <body>
        <h1></h1>
<?php

    $email=$uname=$pnum =$dst=$landmark=$key="";
    if(isset($_POST['OrderInfo']))
    {
        
        $GLOBALS['email']=$_POST['email'];
		$typeoforder=$_POST['typeoforder'];
        $GLOBALS['uname'] =$_POST['uname'];
        $GLOBALS['pnum'] =$_POST['pnum'];
        $GLOBALS['dst']=$_POST['dst'];
        $GLOBALS['landmark']=$_POST['landmark'];
        //echo $email. $uname.$pnum.$dst.$landmark.$key;
        
         $_SESSION['emailS']= $email;
         $_SESSION['unameS']= $uname;
         $_SESSION['pnumS']= $pnum;
        $_SESSION['typeoforderS']= $typeoforder;
         $_SESSION['dstS']= $dst;
         $_SESSION['landmarkS']= $landmark;

        
        
         echo "
                            <div class='container'>
                              <!-- Modal -->
                              <div class='modal show'  role='dialog'>
                                <div class='modal-dialog modal-sm'>
                                  <div class='modal-content'>
                                    <div class='modal-header'>
                                      <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                      <h4 class='modal-title'>OTP Details</h4>
                                    </div>
                                    <div class='modal-body'>
                                      <p>Enter Otp.</p>
                                      <form action='' method='post'>
                                      <input type='password' name='textForKey' value=''/>
                                      <input type='submit' name ='key' value='confirm otp'/>
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

                generateOtp();
        

    }
    





    function generateOtp() 
    {

  

        $to =$GLOBALS['email'];
        $subject = 'Otp and key of your order';
        $str = '';

        $headers="From : EggD<No_reply@eggD.com>";
        $otp_number = mt_rand(100000, 999999);
            $str = $str+$otp_number;

            /*  The above line concatenates one character at a time for
                seven iterations within the ASCII range mentioned.
                So, we get a seven characters random OTP comprising of
                all small alphabets. 
            */

        $str = 'Your one time password and key for order is : '.$str;

        mail($to,$subject,$str,$headers);
        
        $_SESSION['otpSess']= $otp_number;





    }
    


        	
	if(isset($_POST['key']))
		{
           
            $textForKey=$_POST['textForKey'];
            if($textForKey==$_SESSION['otpSess']) 
            {
                $str = file_get_contents('anand.json');
                $json = json_decode($str, true);
                /*echo '<pre>' . print_r($json, true) . '</pre>';*/

                /*for($i=0;$i<=2;$i++){*/

                    
                $key=$textForKey;
                $to=$_SESSION['emailS'];
                
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y/m/d");
                $cur_time=date("h:i:sa");
                
                $expected_time = strtotime("+45 minutes", strtotime($cur_time));
                $expected_delivered= date('h:i:sa', $expected_time);

                $str = file_get_contents('anand.json');
                $json = json_decode($str, true);
                $orderList="";
                $total=0;
                foreach($json as $i) {

                    $temp=$i['name'];
                    $orderList = $orderList . ', ' . $temp;
                    $total=$total+$i['cost'];

                }

                $subject = 'Details of the order';

                $message =  'Details of your order is : '. "\r\n".' Order key  : '.$key . "\r\n" ." Name :". $_SESSION['unameS']. "\r\n" ." Phone Number : ".$_SESSION['pnumS']. "\r\n" ." Address to be delivered : " .$_SESSION['dstS']. "\r\n" ." landmark : ". $_SESSION['landmarkS']. "\r\n" ." Date of the order : ".$cur_date."\r\n" ."your orders list "."\r\n". $orderList."\r\n" ."Total Payment ". $total."\r\n" ." Time of the order : ".$cur_time."\r\n" ." Expeceted Delivery time : ".$expected_delivered."\r\n" ."Thanks for your order sir/maam";

                //echo $message;
                $headers="From : EggD<No_reply@eggD.com>";
                
                
                mail($to,$subject,$message,$headers);
                
                sendMailToAdmin($key);
                insertIntoDatabase($key,$_SESSION['unameS'],$_SESSION['emailS'],$_SESSION['dstS'],$_SESSION['pnumS'],$_SESSION['typeoforderS']);
                enterOrdersIntoDatabase($key);
               
                    
            }
          else
            {
             echo "<script type='text/javascript'>
                                alert('otp not correct');
                            </script>";


            }
        
		
        }




 function insertIntoDatabase($key_order,$user_name,$user_email,$user_address,$user_mobile_no,$typeoforder)
    {
        
                $dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";
                
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y/m/d");
                $cur_time=date("h:i:sa");
        
                $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
        
                if(mysqli_connect_errno())
			     {
                    die("datbase coonection failed" . mysqli_connect_error() );
			     }
                else
                {
                    $query="INSERT INTO user_place_order (key_order,user_name,user_email,user_address,user_mobile_no,time_of_order,date_of_order,type_of_order,total_cost) VALUES ('$key_order','$user_name','$user_email','$user_address','$user_mobile_no','$cur_time','$cur_date','$typeoforder','')";
			$result= mysqli_query($con,$query);
                    
                    
             
                    
                    
                    echo "<script type='text/javascript'>
                            alert('order placed successfully , Your order is only confirmed when You will receive a call');
                        </script>";
						 //unset 
							session_unset();
							// destroy the session
							session_destroy();
							
							  echo "<script type='text/javascript'>
											
												window.location='home.php';
									 </script>";
        
						 
                
               }


    
    }

function sendMailToAdmin($key)
    {
                $dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";
                
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y/m/d");
                $cur_time=date("h:i:sa");
        
                $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
        
        $query= "SELECT email FROM admin_eggd ";
        $result= mysqli_query($con,$query);
			
			while($row=mysqli_fetch_assoc($result))
            {
						
					
					{
						date_default_timezone_set("Asia/Calcutta");
						$cur_date=date("d/m/Y");
						$cur_time=date("h:i:sa");
						
						
						$admin_email=$row["email"];
						$to=$admin_email;

                        $str = file_get_contents('anand.json');
                        $json = json_decode($str, true);
                        $orderList="";
                        $total=0;
                        foreach($json as $i) {

                            $temp=$i['name'];
                            $orderList = $orderList . ',' . $temp;
                            $total=$total+$i['cost'];

                        }

                        $subject = 'Delivery Details';
						
						$message =  "Details of customer for delivery ". "\r\n" . "\r\n" . "\r\n" .' Order key : '.$key . "\r\n" ." Customer Name : ". $_SESSION['unameS']. "\r\n" ." Phone Number : ".$_SESSION['pnumS']. "\r\n" ." Destination Address : " .$_SESSION['dstS']. "\r\n" ." Landmark : ". $_SESSION['landmarkS'] . "\r\n" ."your orders list  "."\r\n". $orderList."\r\n" ."Total Payment ". $total."\r\n" ." Date of order : " .$cur_date . "\r\n" ." Time of order : " . $cur_time ;

						//echo $message;
						$headers="From : EggD<No_reply@eggD.com>";
						
						
						mail($to,$subject,$message,$headers);
						
					}
			}
    
    }

function   enterOrdersIntoDatabase($key)
{
    $dbhost="localhost";
    $dbuser="id56287_softwareiiitv";
    $dbpassword="iiitvsoftware";
    $dbname="id56287_eggafe";

    $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
$str = file_get_contents('anand.json');
$json = json_decode($str, true);
/*echo '<pre>' . print_r($json, true) . '</pre>';*/

/*for($i=0;$i<=2;$i++){*/
    foreach($json as $i) {
        $dish= $i['name'];
        $price=$i['cost'];
        $qty= $i['amount'];
        $query="INSERT INTO order_menu (key_order,dish_name,qty,price) VALUES ('$key','$dish','$qty','$price')";
        $result= mysqli_query($con,$query);

    }
}

    

        ?>
        
            
           
        </body>
    </html>