<?php
function reviewset(){
include 'dataconn.php';
    $conn=database();

/*$query = "Create DATABASE ";
$query = "CREATE TABLE review (name varchar(40),mail varchar(40),view text)";

if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
*/
if(isset($_POST['rev']) && isset($_POST['name']) && isset($_POST['mail']))   { 
        $name=$_POST['name'];
        $mail=$_POST['mail'];
        $view=$_POST['rev'];
          
        
 $query = "INSERT INTO `review`(`name`, `mail`, `view`) VALUES ('$name','$mail','$view')";

    if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
            return 0;
        }
    else {
            echo "<script>
                    alert('Review Submitted');
                    window.location='hospital.php';</script>";
         }

   }
}
?>