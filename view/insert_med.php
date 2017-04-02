<?php
error_reporting(0);
session_start();
$user="";

if(!is_null($_SESSION['username_login'])){
 $user=$_SESSION['username_login'];

}
?>
<?php
$name="";
$degree="";
$date="";
$sp="";
$str="Add";
if(isset($_POST['submit'])){
  $name=$drname;
  $degree=$degree;
  $date=$jdate;
  $sp=$sp;
  $str="Update";
 }
?>
<html>
    <head>
        <title>Hospital</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    </head>
  <style>
      .dropdown-toggle{
      background-color:#2F4F4F;
       color:white;
      }
    </style>
<link href="../css/style.css" type="text/css"
rel="stylesheet" />
    <body>
<div id="login" class="modal fade" role="dialog">
						<div class="modal-dialog">

						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Login</h4>
								</div>
								<div class="modal-body login">
        
									<form action="../controller.php" method="post">
										<fieldset>
										<center><legend> Personal Information</legend></center>
										 <center>Username  <input type="text" name="name"  placeholder="username" required/></center></br>
											<center>Password  <input type="password" name="password" placeholder="min 6 character" required/></center></br>
                                    <button id="submit" name="submit" value="submit">Login</button>	
										
										<input type="hidden" name="activity" value="login"/></br></br>
										
										</fieldset>
									</form>
								
		
		
								</div>
								<div class="modal-footer">
										<!--<p>
												Not yet registered?
											<button type="button" class="btn btn-info btn-lg btn-primary" data-toggle="modal" data-target="#myModal1" data-dismiss="modal">click here</button>
										</p> -->
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

					</div>
				</div>        
<div class="sta"><h1><b>HOSPITAL MANAGEMENT</b></h1></div>
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../hospital.php">Home</a></li>
        <li><div class="dropdown">
  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" >Database
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="doct_view.php">Doctor</a></li>
    <li><a href="med_show.php">Medicine</a></li>
</ul>
</div></li>
        <li><a href="camp.php">Medical Camp</a></li>
        <li><a href="ereceipt.php">E-Receipt</a></li>
<li><a href="health.php">Balance Diet</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
    <?php echo $user;
        if (!empty($user)){
		 echo "<form action='../controller.php' method='post'><button id='logout' class='btn btn-info' name='logout' value='logout'>Logout</button></form>";

        }
		else
		{
		echo "<button  type='button' class='btn btn-info  login' data-toggle='modal' data-target='#login'>Login</button>
  ";	
		}
    ?>      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-3 lsidenav">
      <b>Emergency Services</b></h3><p class="rrt"><b><hr/>Contact: 266065<br/>
<hr/>Dr.rahulbatra@gmail.com<br/>
<hr/>For Ambulance service<br/>
 9415832434<br/>
 9425543212
 <hr/>
 </b>
</p>
<div class="lin">
<p><center>New Updates</center><br\>
<ul class="ln">
<a href="camp.php"><li>Blood donation camp on 23<sup>rd</sup> November</li></a><br/>
<a href="camp.php"><li>Polio camp on 25<sup>th</sup> December</li></a><br/>
<a href="camp.php"><li>Free Dental Checkup on  28<sup>th</sup> December</li></a>
    </div>
    </div>    
    <div class="col-sm-6 text-left">
      <h1>Medicine</h1>

      <hr>
      <form action="../controller.php" name="Medicine" method="post">
<tr><td><label><b>Name of Medicine</b></label></td>
<td><input type="text" name="mname" required></td>
</tr><tr></tr><tr><br/><br/>
</tr>
 
<tr><td><label><b>Amount of Medicine</b></label></td>
<td><input type="int" name="amount" required></td>
</tr><tr></tr><tr><br/><br/>
</tr>   
<tr><td><label><b>Expiry Date</b></label></td>
<td><input type="date" name="edate" required></td></tr><tr></tr><tr>
</tr><br/><br/>
 
        
    <tr><td><input type="hidden" id="activity" name="activity" value="add_medicine"><button type="submit" name="submit" id="submit" value="submit">Submit</button></td></tr>

    
        </table>
	</form>	
    </div>
    <div class="col-sm-3 rsidenav">
      <div class="well">
         <ul class="sin"> <li>Branch of   Hospital</li>
        <li>Delhi</li>
        <li>Mumbai</li>
           <li>Ahmedabad</li>
           </ul>
      </div>
     
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
    </body>
</html>
