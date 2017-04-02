<?php
session_start();
?>
<?php include 'data.php'; ?>

<?php

$checkLoginForAdmin = $_SESSION['adminEmail'];
if (is_null($checkLoginForAdmin)) {
    echo '<script>window.location="home.php"</script>';
} else {
    echo "Welcome " . $checkLoginForAdmin;
}


?>
<?php
if (isset($_POST['logout'])) {
    //unset
    session_unset();
    // destroy the session
    session_destroy();

    echo "<script type='text/javascript'>
                            alert('Logout Successfully');
                            window.location='home.php';
                 </script>";

}

?>
<html>
<head>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title> menu </title>

</head>


<body>
<div class="row">
    <div class="col-lg-4">
        <form method="post">
            <input type="submit" name="logout" value="logout" class="btn btn-danger btn-lg "/>
        </form>
    </div>
    <div class="col-lg-4">
        <a href="recentOrders.php" class="btn btn-info btn-lg pull-right" role="button">Recent Orders</a>
        </div>
    <div class="col-lg-4">
        <a href="makeNewAdmin.php" class="btn btn-info btn-lg pull-right" role="button">Make New Admin</a>
    </div>

</div>

<div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Dish name</th>
                <th>Dish Price</th>
                <th>Image</th>
                <th>Update</th>
                <th>Remove</th>
            </tr>
            </thead>
            <tbody id="block">


            </tbody>
        </table>

        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal" id="order">
            Add New Dish
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Dish Description</h4>
                    </div>
                    <div class="modal-body">

                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Name">Dish Name</label>
                                <input type="text" class="form-control" id="dishname" placeholder="Enter Name"
                                       name="dishname">
                            </div>
                            <div class="form-group">
                                <label for="pn">Dish Price</label>
                                <input type="Number" class="form-control" id="price" placeholder="Enter Dish Price"
                                       name="price">
                            </div>
                            <div class="form-group">

                                <label for="some">Select image to upload</label>
                                <input type="file" name="fileToUpload" id="fileToUpload"><br/>


                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>

</body>

<script>
    $(document).ready(function () {
        var a = 0;
        var text = "";
        $.getJSON('empdata.json', function (data) {
            $.each(data, function (key, value) {

                text += '<tr><td>' + data[a].pro_name + '</td><td>' + data[a].price + '</td><td>' + '<img src="images/' + data[a].image + '" alt="Avatar" style="width:40px;height:50px;">' +
                    '</td><td><form method=post action=update.php><button data-toggle="modal" data-target="#nModal" class="btn btn-info"name=update id=update value="' + data[a].pro_name + '">Update</button><input type="hidden" name=price id=price value="' + data[a].price + '"><input type="hidden" id=image_name price value="' + data[a].image + '"></form></td></td><td><form action=delete.php method=post><button class="btn btn-danger" name=remove id=remove value="' + data[a].pro_name + '">Remove</button></form></td></tr>';

                a++;
            });

            document.getElementById("block").innerHTML = text;
        });

    });
</script>

</html>
