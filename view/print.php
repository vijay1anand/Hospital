<html>
<head>
<title>Print</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
 .sta{
   font-family: Arial, Verdana, sans-serif;
  color:blue;
  text-align:center;
  height:60px;
  width:auto;
  word-spacing:1em;
  background-color:floralwhite;
  padding:4px;
  margin-top:-8px;   
	
}    
 .ste{
   font-family: Arial, Verdana, sans-serif;
  color:blue;
  text-align:center;
  height:60px;
  width:auto;
  word-spacing:1em;
  background-color:floralwhite;
  padding:4px;
  margin-top:-8px;   
	
}  
.row{
	background-color:#93ADB9;
}  
</style>
<body>
<div class="sta"><h1><b>Arihant Hospital Receipt</b></h1></div>
<center><h1>Receipt</h1></center>
<div class="container">
 <div class="row">
  <p><b>Receipt No.: &nbsp&nbsp&nbsp<?php echo $_POST['reci'];?></b><br/>
  <p><b>Patient Name : <?php echo $_POST['fname'];?></b><br/>
  <p><b>Gender : <?php echo $_POST['gender'];?></b><br/>
  <p><b>Mobile : <?php echo $_POST['mob'];?></b><br/>
  <p><b>Disease: <?php echo $_POST['dis'];?></b><br/>
  <p><b>Medicines: <?php echo $_POST['med'];?></b><br/>
  <p><b>Total Coat: <?php echo $_POST['cha'];?></b><br/>
  <p><b>ID Proof: <?php echo $_POST['tid1'];?></b><br/>
  <p><b>ID No.: <?php echo $_POST['id'];?></b><br/>
  
  </p>
  </div>
  <button onclick=print(); class="btn btn-info">Print</button>
  <input type="button" value="Return" onclick="window.open('ereceipt.php')" />
  <div class="ste"><h1><b>Thank You</b></h1></div>
</body>
</html>