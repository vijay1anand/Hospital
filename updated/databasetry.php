<html>
    <head>
    
    </head>
    <body>
        
<!-- connecntion established to database-->
        <?php
        $dbhost="localhost";
        $dbuser="id56287_softwareiiitv";
        $dbpassword="iiitvsoftware";
        $dbname="id56287_eggafe";

        $con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

        $emailOfAdmin="visraman26@gmail.com";
            $password="12345";

        $query="UPDATE admin_eggd SET password='$password' WHERE email = '$emailOfAdmin'";
        $result= mysqli_query($con,$query);
        ?>
        
    
    </body>

</html>