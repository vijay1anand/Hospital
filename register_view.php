<html>
    <head>
        <title>Registration</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    </head>
<script>
    function validateForm(){
    var password = document.forms["register_form"]["password"].value;
    var mobile = document.forms["register_form"]["mo_num"].value;
    var error="";
    var i=0,sr="";
    for(i=0;i<mobile.length;i++)
    {
      sr+=mobile[i];
      var ch=mobile.charCodeAt(i);
      if(ch>9){
        error = "Mobile Number is inapporopriaate"+ch+"   "+sr; 
           alert(error);
        return false;
      }
    }
    if(password.length<7){
           error = "Password Length Is Less Than 7"; 
   alert(error);
        return false;
     }
    if(mobile.length<10){
           error = "Not a valid Mobile Number"; 
           alert(error);
        return false;
     }    
    else{
          alert("success"); 
    }    
    }
    </script>
  <body>
      <h1>Registration Form</h1>
      
          <div class="container">
          <div class="row">
        <div class="col-sm-4">
      <form name="register_form" action="register_model.php" onsubmit="return validateForm()" method="post">;      
  <div class="form-group">
      
<label for="name">Name:</label>
<input type="text" placeholder="Enter Name" class="form-control" id="name" required>
            </div><div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" placeholder="Email" class="form-control" id="email" required>
  </div>
<div class="form-group">
<label for="mo_num">Mobile:</label>
<input type="text" placeholder="Mobile" class="form-control" id="mo_num" required>
            </div>            
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" placeholder="Password must be 7 character Long" class="form-control" id="password" required>
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
              </div>      
          </div>
          </div>
    </body>
</html>