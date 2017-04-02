<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="Egg-Dee";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
    if ($conn->connect_error) 
        {
             die("Connection failed: " . $conn->connect_error);
           } 
//echo "Connected successfully";
    $sql = "SELECT * FROM menu";
           $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
    // output data of each row
                 $emparray = array();
                 while($row = $result->fetch_assoc())
                     {    
                         $emparray[] = $row;
                         }
                      $fp = fopen('empdata.json', 'w');
                      fwrite($fp, json_encode($emparray));
                      fclose($fp);
                      
                
                 }else
            {
    echo "No items are Present in menu";
}
            
$conn->close();



?>
<html>
     <head> 
        <title> menu </title>
    </head>
   
   
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
         <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
         <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway"/>
         <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans+Condensed" />
         <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
         <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
         .card-box
             {
                 width: 80%;
                 height:auto;
                 border: 1px solid black;
                 background-color:aliceblue;
                 left:10%;
                 border-radius:2px;
                 margin-top:-6%;
             }
             .c11
             {
                 width:100%;
                 text-align:center;
                 color:green;
                 font-family: 'Lato', sans-serif;
                 font-size:30px;
                 margin-top: 2%;
                 margin-bottom: 3%;
             }
             .card 
             {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                z-index:-100;
                visibility:visible;
                
             }
             img
             {
                 z-index:-1;
             }

          .card:hover 
              {
                 
                background-color:green;
                color:aliceblue;
                transition:all 0.3s ease-in; 
                
             }
             .row
             {
               margin-right: -15px;
               margin-left: -15px;
               margin-bottom: 6%;
             }
            
            .layout
             {
                position:absolute;
                opacity:0;
                left:15px;
                top:0%;
                width:92%;
                 height:150px;
                display:flex;
                justify-content:center;
                align-items:center;
                overflow:hidden;
                
             }
            
             .card:hover .layout
             {   
                
                 background-color:orange;
                 transition:All 0.3s linear;
                 opacity:0.7;
                
                 
             }
             .card:hover span
             {
                 border:1px solid green;
                 border-radius:2px;
                 transition:All 0.3s linear;
                 padding-left:20px;
                 padding-right:20px;
                 padding-top:12px;
                 padding-bottom:12px;
                 background-color:orange;
                
        
             }
             .col-md-3.col-xs-6.col-sm-4.col-lg-4
             {
                padding-bottom:4%; 
              }
    </style>
<body>
     <div class="container card-box">
                       <div class="conatiner c11">
                              popular dishes
                       </div>
                      <div class="row" id="row">
                                <div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">  
                                           <div class="card" id="card">
                                                            <img src="" alt="Avatar" style="width:100%;height:150px;">
                                                            <div class="container layout">
                                                                <a href="#" style="text-decoration:none;color:green;size:20px;"> 
                                                                    <span>order </span>
                                                                </a>                                    
                                                            </div>
                                                            <div class="container">
                                                                 <h4><b id="pro_name">Egg-Bhurji</b></h4> 
                                                                <p id="price">price - 60 Rs</p> 
                                                            </div>
                                                 
                                            </div>
                                           
                          
                               </div>
                     </div>
    </div>
    
      
    <script>
        $(document).ready(function(){
            var a=0;
            var text="";
             $.getJSON( 'empdata.json', function( data ) {      
                 $.each( data, function( key, value ) {
                               
                     
                    text = text+ '<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4"><div class="card" id="card"><img src="" alt="Avatar" style="width:100%;height:150px;"><div class="container layout"><a href="#" style="text-decoration:none;color:green;size:20px;"><span>order </span</a></div><div class="container"><h4><b id="pro_name">' +data[a].pro_name + '</b></h4><p id="price">price -'+data[a].price +'Rs</p></div></div></div>'
                                a++;
                                 
                               });
                 document.getElementById('row').innerHTML=text;
                     });
        });
    </script>
</body>    
</html>