<html>
    <head>
        <title>Update</title>
    </head>
     <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
         <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
<body>
   <div class="container col-xs-4">
        <div class="row">
   
                                         <h4 class="modal-title">Update Dish</h4>
                                    
                                 <div class="modal-body">
                                    
                            <form method="post" enctype="multipart/form-data">                     
    <div class="form-group">
                                        <label for="Name">Dish Name</label>
                                       <input type="text" class="form-control" id="dishname" value="<?php echo $_POST['update'];?>" name="dishname" readonly="readonly">
        
                                </div>
                                <div class="form-group">
                                        <label for="pn">Change Dish Price</label>
                                       <input type="Number" class="form-control" id="price" value="<?php echo $_POST['price'];?>" name="price">
                                </div>
    <div class="form-group">                                 
                          
                            <label for="some">Select new image to upload</label>
                                <input type="file" name="fileToUpload" id="fileToUpload"></input><br/>
                                
                            
                        </div> 
             
        
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           </form>
       </div>
    </div>
    </body>
</html>  
<?php
if(isset($_POST['submit'])){
    $dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $conn= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);    
// Check connection
    if ($conn->connect_error) 
        {
             die("Connection failed: " . $conn->connect_error);
           }
    
  $b=basename($_FILES["fileToUpload"]["name"]);
    if(empty($b)){
                 echo "price only ";

            $query="UPDATE `menu` SET `price`='$_POST[price]' WHERE pro_name='$_POST[dishname]'";
       
                            if (!$conn->query($query)) {
                                                        echo "Error: ".$conn->error;
                                                        return 0;
                                                        }
                                    else{
                                            echo "updated price";
                                            header('Location: menu_admin.php');
                                        }
    
     }
    
else{
      echo "price and image";
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    }
            else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
                                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                    $uploadOk = 0;
                                    }
            if ($uploadOk == 0) {
                                        echo "Sorry, your file was not uploaded.";
                                    // if everything is ok, try to upload file
                                } 
            else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $b=basename( $_FILES["fileToUpload"]["name"]);
                        echo "The file ".$b. " has been uploaded.";
                    } else {
        echo "Sorry, there was an error uploading your file.";
            }
                
           }
        $query="UPDATE `menu` SET `price`='$_POST[price]',`image`='$b' WHERE pro_name='$_POST[dishname]'";
       
    if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
    else{
         echo "image";
         header('Location: menu_admin.php');
       }
    }
    
   }
?>