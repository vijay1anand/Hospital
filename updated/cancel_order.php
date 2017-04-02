<html>
<head>

    <title> EggAfe </title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>

<div class="container">
    <h2>Cancel Order</h2>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" >

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Enter Order Key : </label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  placeholder="Enter Key" name='keyForCancel' value=""  required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name='submitForCancel' class="btn btn-success" value="Cancel Order" class="btn btn-info"/>
            </div>
    </form>
</div>

<?php
$dbhost = "localhost";
$dbuser = "id56287_softwareiiitv";
$dbpassword = "iiitvsoftware";
$dbname = "id56287_eggafe";

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);


?>
<?php
if (isset($_POST['submitForCancel'])) {
    $keyForCancel = $_POST['keyForCancel'];

    $query = "SELECT * FROM user_place_order where key_order='$keyForCancel' ";
    $result = mysqli_query($con, $query);
    $query1 = "SELECT * FROM cancel_order where key_order='$keyForCancel' ";
    $result1 = mysqli_query($con, $query);

    if ((mysqli_num_rows($result) > 0)&&mysqli_num_rows($result1)<0) {
        date_default_timezone_set("Asia/Calcutta");
        $row = mysqli_fetch_assoc($result);
        $time_of_order = $row['time_of_order'];
        $email = $row['user_email'];
        echo "Details of order  "."<br>";
        echo "<br>";
        echo "Email : " . $email."<br>";
        echo "Time of order : " . $time_of_order."<br>";
        echo "<br>";
        $time_for_cancel = strtotime("+15 minutes", strtotime($time_of_order));
        $last_time_for_cancel = date('h:i:sa', $time_for_cancel);
        echo "Last Time for Cancel : " . $last_time_for_cancel;
        echo "<br>";

        $cur_time_of_cancel = date("h:i:sa");
        
        echo "<br>";
        if (strtotime($cur_time_of_cancel) < strtotime($last_time_for_cancel)) {
            $query = "INSERT INTO cancel_order (key_order,time_of_cancel,email) VALUES ('$keyForCancel','$cur_time_of_cancel','$email')";
            $result = mysqli_query($con, $query);
            echo "Status : Ordered Canceled";
        } else {
            echo "Status : Cannot Cancel";

        }


    } else {

        echo "corresponding to this key no order is there";
    }

}


?>
</body>
</html>