<?php include_once '../helper/data.php'; ?>
<?php

					session_start();

						$username=$_SESSION['username_login'];
						$email=$_SESSION['email_login'];

						if(!is_null($email))
                        {
                            echo  '<script>window.location="menu_user_login.php"</script>';

                        }
?>
<html>
     <head> 
        <title>EggAfe</title>
         
    </head>
   
   
              <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
         <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<style>
           body
             {
                 max-width:100%;
                 overflow-x:hidden;
                 overflow:-moz-scrollbars-vertical;
                 overflow-x:hidden;
                 overflow-y:auto;

             }
         .card-box
             {
                 width: 80%;
                 height:auto;
                 left:10%;
                 border-radius:2px;
                 margin-top:6%;
             }
              .btn-primary
                {
                color: #fff;
                background-color: #0a253e;
                margin-top: 1%;
               margin-bottom: 1%;
              }
              .btn-info:hover {
    color: #fff;
    background-color: #286090;
    border-color: #204d74;
}
              .btn-info 
              {
                  color: #fff;
                  /* border-color: #46b8da; */
                  background-color: #0a253e;
              }
              .cf1
             {
                 background-color: #0a253e;
                 width:100%
             }
            li a
             {
                 font-family:Raleway;
                 letter-spacing:2px;
                 font-weight:200;
                 font-size:20px;
                
                 
             }
           .navbar-default .navbar-nav>li>a:hover
             {
                color: white;
                background-color: transparent;
             }
             
         .container-fluid>.navbar-collapse, .container-fluid>.navbar-header, .container>.navbar-collapse, .container>.navbar-header {
                 margin-right: 10px;
                 margin-left: 30%;
               }
            .navbar-fixed-top
               {
                 top:0;
                 border-width:0 0 10px;
             }
             .navbar-default 
              {
                 border-color: #0a253e;
              }
             .c11
             {
                 width:100%;
                 text-align:center;
                 color:green;
                 font-family:Raleway;
                 font-size:30px;
                 margin-top: 5%;
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
             .head
                {
                   text-align:center;
               }
          
             .row
             {
               margin-right: -15px;
               margin-left: -15px;
            
             }
          .c12{
               margin-top:16%;
               margin-left:15%;    
               } 
              .col-xs-3
                {
                   position:fixed;
                   margin-top:10%;
                   right:10px;
                   border:1px solid black;
                   
                 }
            
            
             .col-md-3.col-xs-6.col-sm-4.col-lg-4
             {
                padding-bottom:4%; 
              }
            .navbar-nav>li>.dropdown-menu 
             {
                margin-top: 0;
                background-color: aliceblue;
                border-radius: 4px;
              }
             .menu
               {
                margin-top:30px;
            
               }
              .cart1
              {  position:fixed;
                  right:2%;
                 margin-top:10%;
                 border:2px solid black;
                overflow:hidden;
               }
             .footer
             {   position: relative;
                 background-color:#0a253e;
                 width:100%;
                 height:auto;
                 color:white;
                 font-family:Raleway;
                 text-align:center;
                 z-index:-1;
             }
            input.logout
            {
                  background-color: #0a253e;
                  border: 1px solid #0a253e;
                  color: white;
                  font-size: 20px;
                  margin-top: 10%;
             }
          .modal-header 
            {
                 padding: 10px;
                border-bottom: 1px solid white; */
                 /* background-color: white; */
                border-top: 4px solid orange;
                color:orange;
            }
    .modal-content
    {
          border-top:4px solid orange;
    }
     @media screen and (max-width: 500px)
              {
                 .add-cart
                        {
                         width:100%;
                        }
              }

    </style>
    <body>
     <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid cf1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span> 
                    </button>
        
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                         <ul class="nav navbar-nav">
                               <li><a href="home.php">Home</a></li>
                               <li><a href="AboutUs.html">About us</a></li>
                               <li><a href="menu_user.php">Menu</a></li>
                               <li><a href="#contect" id="showpop">Contact</a></li> 
                               <li><a href="#">Offers</a></li> 
                    </ul>
                 </div>
           </div>
    </nav>

   
    <script>
        $(document).ready(function(){
             var a=0;
            var text="";
             $.getJSON( 'empdata.json', function(data ) {      
                 $.each( data, function( key, value ) {
                               
               text += '<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">'
                    +'<div class="card" id="card"><img src="images/'+data[a].image+'" alt="Avatar" style="max-width:100%;max-height:121px;">'+'<div class="container"><p><b>'+data[a].pro_name+'</b></p><p>price- '+data[a].price+'/-</p></div>'
                   +
                   '<div style="wordwrap:breakword;"><form action="just.php" method=post><button class="add-cart btn btn-primary" name=submit value=submit style="margin-left:5%;margin-bottom:5%;background-color:#0a253e;wordwrap:break-word;">Add To Cart</button><input type="hidden" name=price id=price value="'+data[a].price+'"><input type="hidden" name=pro_name id=pro_name value="'+data[a].pro_name+'"></form></div></div></div>'
                    a++;
                   
            });
                 document.getElementById("block").innerHTML=text;
                     });
            
        });

        function udatabase() {
            document.getElementById('ifCSV').style.display = "none";
            document.getElementById('ifCS').style.display = "none";
        }
        function ucsv() {
            document.getElementById('ifCSV').style.display = "block";
            document.getElementById('ifCS').style.display = "block";
        }

    </script>
     <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();
         });
     </script>



<div>
    

</div>
<div class="container row menu">
        <div class="col-lg-9 col-xs-7 col-sm-7 col-md-9">
             <div class="row">          
                       <div class="container card-box">
                           <div class="head">
                                   <h1 style="text-color:#0a253e;text-decoration:underline;">See our menu here </h1>
                           </div>
                           <div class="row" id="block">
                           
                           </div>
                       </div>
            </div>

       </div>
        <div class="col-lg-3 col-xs-5 col-sm-5 col-md-3 cart1">
            
                      <div class="container row" style="background-color:#0a253e;">
                           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                               <b style="padding-left:4%;color:white;">Shopping Cart</b>
                           </div>
                           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                               <button type="button" class="btn-danger" id="clear-cart" style="margin-left:4%;">Clear Cart</button>
                           </div>
                      </div>
 
            <form>       
                <div class="container row">
                          <ul id="show-cart">
             
                          </ul>
                    </div>
                        <button id="sendToserver"class="btn btn-primary" onclick="saveCart()">save cart</button>
                                </form>
                    <div class="container row" style="background-color:#0a253e;z-index:-1;">
                            <div id="total_cost" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="color:white;"></div>
                            <div id="total_item" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="color:white;"></div>
                            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                    <div>
                                  
                                </div>
          
                                
                                <div class="container box-model">
    
                 <!-- Trigger the modal with a button -->
                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="order"  >Order</button>

            
                        
</div>                 
                        
                        
                        
                        
                        
                        
             
                    </div>
        

     </div>



 </div>

</div>
</div>
                            
<div class="container-fluid footer" id="contect">
              <div class="footer-body">
                  <address style="font-size:18px;padding-top:2%;">
                        EggAFF.®</br>
                        Reliance Chaukdi.</br>
                        Gujrat,Gandhinagar</br>

                        Phone:9687977733
                  
                  </address>
              </div>
     </div>
 <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
    
      <!-- Modal content-->
                                  <div class="modal-content">
                                      <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" style="color:orange;">&times;</button>
                                          <h2 style="text-align:center;">Customer Information</h2>
                                      </div>
                                 <div class="modal-body">
                                    
                                            <form action="order.php" method="post">
                                <div class="form-group">
                                          <label for="email">Email:</label>
                                         <input type="email" class="form-control" id="email"  placeholder="Enter email" name="email" >
                                 </div>
                                <div class="form-group">
                                        <label for="Name">Name</label>
                                       <input type="text" class="form-control" id="name" placeholder="Enter Name" name="uname">
                                </div>
                                <div class="form-group">
                                        <label for="pn">Phone Number:</label>
                                       <input type="Number" class="form-control" id="phone" placeholder="Enter Phone Number" name="pnum">
                                </div>
                                                <div class="form-group">
                                                    <label><input id="preradio" type="radio" name="typeoforder" value="preorder" onclick="udatabase()">Pre order</label>

                                                    <label><input id="delradio" type="radio" name="typeoforder" value="delivery" onclick="ucsv()" >Delivery</label>
                                                </div>
                                <div class="form-group" id="ifCSV" style="display:none">
                                        <label for="dst">destination Address:</label>
                                       <input type="textarea" class="form-control" id="pwd" placeholder="Enter Address" name="dst" value="">
                                </div>
                                 <div class="form-group" id="ifCS" style="display:none">
                                        <label for="land">landmark:</label>
                                       <input type="textarea" class="form-control" id="pwd" placeholder="Enter Near By Place" name="landmark" value="">
                                </div>
                                    <div class="form-group" id="f1">
                                        <button class="btn btn-default" onclick="my()">Order Summery</button>
                                    </div>
                                <button type="submit" class="btn btn-default" name="OrderInfo">continue</button>

                                        
                                        
                                        
                                     </form>
                                </div>
                           <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
    
      
    </div>
  </div>
  
</div>
    
</body>    
</html>
<script>
    var value=0;
    $("#clear-cart").click(function(event){
       clearCart();
       displayCart();
        $("#total_cost").html(" ");
        $("#total_item").html(" ");
    });  
    
    $(".add-cart").click(function(event){
     event.preventDefault;
        var name=$(this).attr("pro_name");
        var price=Number($(this).attr("price"));
        addItemToCart(name,price,1);
        displayCart();
        
        
    });
    
    function displayCart(){
      var cartarr=listCart();
        var output="";
        for(i in cartarr){
         output +="<li><button type='button' class='btn-danger delete-item' pro_name='"+cartarr[i].name
             +"'>X</button>"
             +"<button type='button' class='btn-primary add-item' pro_name='"+cartarr[i].name
             +"'price='"+cartarr[i].cost
             +"'>+</button>"
             +"<button type='button' class='btn-info remove-item' pro_name='"+cartarr[i].name
             +"'>-</button>"
             +" "+cartarr[i].name+" "+ cartarr[i].amount+"</li>"
       
        }
        $("#show-cart").html(output);
        $("#total_cost").html("Total Cost = "+totalCost()+"/-");
        $("#total_item").html("Total Item = "+totalItemCart());
        return false;
    }
    
    $("#show-cart").on("click",".delete-item",function(event){
      var temp=$(this).attr("pro_name");
        removeAllItemToCart(temp);
        displayCart();
    });
    $("#show-cart").on("click",".add-item",function(event){
      var name=$(this).attr("pro_name");
        var price=Number($(this).attr("price"));
        addItemToCart(name,price,1);
        displayCart();
    });
     $("#show-cart").on("click",".remove-item",function(event){
      var name=$(this).attr("pro_name");
       removeItemToCart(name);
        displayCart();
    });
//function are above
    var cart=[];
 //making of item type    
 var item = function(name,cost,amount){
     this.name=name;
     this.cost=cost;
     this.amount=amount;
    
    };

   
    //insert item in cart 
    function addItemToCart(name,cost,amount){
        for(var i in cart){
          if(cart[i].name === name){
             cart[i].amount += amount;
              return;
          }
        }
    var mi=new item(name,cost,amount);
     cart.push(mi);
     saveCart();    
    }  
   
    //remove item from cart
    function removeItemToCart(name){
      for(var i in cart){
          if(cart[i].name === name){
              cart[i].amount--;
              if(cart[i].amount === 0)
                  cart.splice(i,1);
              break;
           }
       }
        saveCart();
     }
   //remove all item from cart
  function removeAllItemToCart(name){
      for(var i in cart){
            if(cart[i].name === name){
              cart[i].amount=1;
             removeItemToCart(cart[i].name);
         }
      }
      saveCart();
   }
    // clear cart
    function clearCart(){
       cart=[];
    saveCart();
    }
    //total item in cart
    function totalItemCart(){
     var total=0;
     for(var i in cart){
      total += cart[i].amount;
     }
     return total;    
    
   }
//gettin total cost    
function totalCost(){
     var totalprice=0;
     for(var i in cart){
         var a = Number(cart[i].cost);
         var b = Number(cart[i].amount);
         totalprice += a*b;
     }
     return totalprice;    
 } 
    
// list cart
    function listCart(){
     //return cart; object passing can be problem some
        var cartcopy=[];
         for(var i in cart){
            var item = cart[i];
             var itemcopy={};
              for(var m in item){
                  itemcopy[m]=item[m];
               }
             cartcopy.push(itemcopy);
                 
       }
     return cartcopy;
    }
    
    //saving cart so that cart remain available if user refresh the page
    
function saveCart(){


    localStorage.setItem("shopcart",JSON.stringify(cart));
    window.location.reload();
    
 }
 function loadCart(){
    cart=JSON.parse(localStorage.getItem("shopcart"));
    return cart;
 }  
    loadCart();
    displayCart();
$('#sendToserver').click(function(e) {
        e.preventDefault();
        $.post('st.php','data='+JSON.stringify(localStorage.getItem("shopcart")), function(data){
            console.log(data);
        });
        console.log("Clicked");
    })    
    
function my()
            {
               
              var p=loadCart();
              var output="<div class='row'><div class='col-md-4'>Dish</div><div class='col-md-4'>price</div><div class='col-md-4''>quantity</div></div>";
              for(i in p)
                  {
                      output=output+"<div class='row'><div class='col-md-4'>"+p[i].name+"</div><div class='col-md-4'>"+p[i].cost+"</div><div class='col-md-4'>"+p[i].amount+"</div></div>"
                  }
                
                $("#f1").html(output);
                $("#f1").append("</br>total-price = "+totalCost());
                
           }
    </script>    