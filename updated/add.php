<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$dbhost="localhost";
                $dbuser="id56287_softwareiiitv";
                $dbpassword="iiitvsoftware";
                $dbname="id56287_eggafe";

                $conn= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

if(isset($_POST["submit"]) && isset($_POST["dishname"]) && isset($_POST["price"])) {
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
       && $imageFileType != "gif" && $imageFileType != "tif"&& $imageFileType != "tiff") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $b=basename( $_FILES["fileToUpload"]["name"]);
        echo "The file ".$b. " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    
$query ="INSERT INTO `menu`(`pro_name`,`price`,`image`) VALUES ('$_POST[dishname]','$_POST[price]','$b')";
   
    if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
    else{
         echo "inserted succesfully";
         header('Location: menu_admin.php');
       }
}

?>