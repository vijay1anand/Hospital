<?php include'../model/doc.php'?>
<?php
error_reporting(0);
session_start();
$user="";

if(!is_null($_SESSION['username_login'])){
 $user=$_SESSION['username_login'];

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


<table class="table table-striped">
    <thead>
         <tr>
        <th>Doctor</th>
        <th>Specialization</th>
        <th>Degree</th>
        <th>Join Date</th>
        <th>Update</th>
        <th>Remove</th>
             
      </tr>
    </thead>
    <tbody id="block">
       
       
</tbody>
  </table>  
<script>
    
  
        $(document).ready(function(){
            var a=0;
            var text="";
             $.getJSON( 'empdata.json', function(data ) {      
             $.each( data, function( key, value ) {
                               
        text +='<tr><td>'+data[a].Dr_name+'</td><td>'+data[a].Specalise+'</td><td>'+data[a].degree+'</td><td>'+data[a].join_date+'</td><td><form method=post action=update_doc.php><input type="hidden" id=activity  name=activity value="update"><input type="hidden" name=jdate id=jdate value="'
        +data[a].join_date+'"><input type="hidden" id=degree name=degree  value="'
        +data[a].degree+'"><input type="hidden" id=speci name=speci  value="'
        +data[a].Specalise+'"><input type="hidden" name=drname id=drname value="'
        +data[a].Dr_name+'"><button class="btn btn-info" name=submit id=submit value=submit>Update</button></form></td><td><form method=post action=../controller.php><input type="hidden" name=jdate id=jdate value="'+data[a].join_date+'"><input type="hidden" name=remove id=remove value="'+data[a].Dr_name+'"><input type="hidden" id="activity" name="activity" value="delete"><button class="btn btn-danger" name=submit id=submit value=submit>Remove</button></form></td></tr>';
                   
                    a++;
                 
                  });
                
                 document.getElementById("block").innerHTML=text;
                     });
            
        });
    </script>
    <form method=post action=insert_doct.php><button  class="btn btn-primary btn-block" name="add" value="add">Add New Doctor</button></form>
       
</body>





</html>


