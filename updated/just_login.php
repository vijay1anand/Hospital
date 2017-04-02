
<?php
$pro_name=$_POST['pro_name'];
$price=$_POST['price'];
?>
<html>
    <head>
    <title>Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        </script>
<style>    

</style>


  
    </head>
    <body>
    <div id="extraControls" class="hidden">    
       <h3>Shopping Cart</h3>
        <div>
            <ul>
                <li><a class="add-cart" href="#" pro_name="<?php echo $pro_name;?>" price="<?php echo $price;?>">ADD</a></li>
            <script>
                     jQuery(function(){
                     jQuery('.add-cart').click();
                     });
            </script>    
            </ul>
            <button type="button" class="btn-danger" id="clear-cart">Clear Cart</button>
        </div>
        <div>            
            <ul id="show-cart">
             
            </ul>
            <div id="total_cost"></div>
            <div id="total_item"></div>
            <button class="btn btn-primary" onclick="saveCart()">save cart</button>
            <div class="container box-model">
                
                 <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="order">Order</button>

                <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
    
      <!-- Modal content-->
                                  <div class="modal-content">
                                      <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title">Modal Header</h4>
                                      </div>
                                 <div class="modal-body">
                                    
                                            <form action="order.php" method="post">
                                <div class="form-group">
                                          <label for="email">Email:</label>
                                         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
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
                                        <label for="dst">destination Address:</label>
                                       <input type="textarea" class="form-control" id="pwd" placeholder="Enter Address" name="dst">
                                </div>
                                 <div class="form-group">
                                        <label for="land">landmark:</label>
                                       <input type="textarea" class="form-control" id="pwd" placeholder="Enter Address" name="landmark">
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
        if(name==1 || price==0 ){
		window.location = "menu_user.php";
		}
		else{
        addItemToCart(name,price,1);
        displayCart();
        
        window.location = "menu_user_login.php";
		}
    });
    localStorage.setItem("user","anand");
    function displayCart(){
      var cartarr=listCart();
        var output="";
        for(i in cartarr){
         output +="<li>"+cartarr[i].name
             +"  "+cartarr[i].amount
             +" "+cartarr[i].cost+"     "
             +"<button type='button' class='btn-danger delete-item' pro_name='"+cartarr[i].name
             +"'>X</button>"
             +"<button type='button' class='btn-primary add-item' pro_name='"+cartarr[i].name
             +"'price='"+cartarr[i].cost
             +"'>+</button>"
             +"<button type='button' class='btn-info remove-item' pro_name='"+cartarr[i].name
             +"'>-</button>"
             +"</li>";
       
        }
        $("#show-cart").html(output);
        $("#total_cost").html("Total Cost = "+totalCost() );
        $("#total_item").html("Total Item = "+totalItemCart());
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
    
 }
 function loadCart(){
    cart=JSON.parse(localStorage.getItem("shopcart"));
    
 }  
    loadCart();
    displayCart();
    /*var ans=listCart();
    for(var key in ans)
     console.log(ans[key]);
    
    localStorage.setItem("user","anand");
    localStorage.setItem("pass","anand123");
    addItemToCart("egg pulav",24,1);
    addItemToCart("egg kima",60,1);
    addItemToCart("egg bhurji",80,2);
    addItemToCart("egg bhurji",80,1);
    for(var key in cart)
    console.log(cart[key]);
    console.log("total item = "+totalItemCart());
    console.log("Amount Paid = "+totalCost());
    var ans=listCart();
    console.log("After getting back");
    for(var key in ans)
    console.log(ans[key]);
    clearCart();
    removeAllItemToCart("egg bhurji");
    removeItemToCart("egg kima");
    for(var key in cart)
    console.log(cart[key]);
  */
</script> 