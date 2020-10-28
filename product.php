<?php 
require 'includes/common.php';
IF(isset($_SESSION['email'])) 
{
                         include 'includes/getuserid.php';
                             $userid= userid();
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Product Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
         <link rel="stylesheet" href="css/product.css">
   
    </head>
    <body>
 <header>
     
                <?php include 'includes/navbar.php';?>
     
     <?php include 'includes/checkifadded.php'?>;
        </header>
        <div class=" container jumbotron text-center">
            <h1>SALE 10% OFF <h5>At Checkout </h5></h1>
            <h1 > FLAGSHIP PHONES </h1>
            
        </div>
        <DIV class="container margin">
           <!-- // CONTAINER BLOCK
            //ROW 1- START-->
            <div class="row">
                 <!--//col 1 starts-->
                <div class="col-md-4 col-sm-8 col-lg-4">
                    <div class="thumbnail">
                        <div class="img"> <img  src="IMG/oneplus-8-pro.jpg" class="img-responsive img " alt="oneplus 8 pro"  > </div>
                        <div class="caption center  bimg cpad">
                            <h3> ONEPLUS 8 PRO 8/128GB</h3>
                            <p> Price.Rs.54,999</p>
                          <!-- getteing userid -->
                           
                           <!-- querring current qty of item -->
                           <?php IF(isset($_SESSION['email'])) 
                           {$SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='1'
                                             WHERE users.id='$userid' AND items.id=1 AND users_items.status='Added to Cart'";
 
                                $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
                               
 
                        $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
                             $QTY=$row_fetch=$row_fetch['quantity']; 
                              if($QTY==NULL)
                             {
                                 $QTY=0;
                             }
                             echo "<h5><strong>QTY IN CART :-</strong> $QTY</h5>";
                             }
                             ?>
                           
                           
                               <?php if (isset($_SESSION['email'])||isset($_SESSION['name']) )
                   
                       {  ?>     
                   
                              <form  action="includes/cartadd.php?id=1 "method="POST">
                                       <label for="quantity"> Quantity  </label>
                                       <input type="text"   class="form-control"name="quantity" value="1">
                             
                   
                              
                <div class="btn-group btn-group-lg buttonedit">
                    
                    <button type="sumbit" class="btn btn-success btn-block "  style="font-variant: small-caps; font-size: 20px;">ADD</button>
                </div> 
                              </form>
               
             <?php  } 
               else     
                            {  ?>
                                
                            <div class="btn-group btn-group-lg buttonedit">
                                <button type="button" class="btn btn-default btn-block " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">BUY NOW</a></button>
                                </div>
                           <?php 
                            
                        }?>
                            
                        </div>
                        
                    </div>
                        
                </div>
                <!--//col 1 ENDS-->
                        <!--//col 2 starts-->
                          <div class="col-md-4  col-sm-8 col-lg-4">
                    <div class="thumbnail">
                      
                        <div class="img">  <img  src="IMG/oneplus-8.png" class="img-responsive img" alt="oneplus 8" ></div>
                        <div class="caption center bimg cpad">
                            <h3> ONEPLUS 8  8/128GB</h3>
                            <p>Price.Rs.44,999</p>
                           
                            
                             <?PHP                          
                           IF(isset($_SESSION['email'])) 
                          {   $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='2'
                                             WHERE users.id='$userid' AND items.id=2 AND users_items.status='Added to Cart'";
 
                                $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
                               
 
                        $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
                             $QTY=$row_fetch=$row_fetch['quantity'];  
                              if($QTY==NULL)
                             {
                                 $QTY=0;
                             }
                                  echo "<h5><strong>QTY IN CART :-</strong> $QTY</h5>";
                             }
                             ?>
                           
                          <?php if (isset($_SESSION['email'])||isset($_SESSION['name']) )
                   
                       {  ?>     
                   
                              <form  action="includes/cartadd.php?id=2 "method="POST">
                                       <label for="quantity"> Quantity</label>
                              <input type="text"   class="form-control"name="quantity" value="1"> 
                   
                              
                <div class="btn-group btn-group-lg buttonedit">
                    
                    <button type="sumbit" class="btn btn-success btn-block "  style="font-variant: small-caps; font-size: 20px;">ADD</button>
                </div> 
                              </form>
               
             <?php  } 
               else     
                            {  ?>
                                
                            <div class="btn-group btn-group-lg buttonedit">
                                <button type="button" class="btn btn-default btn-block " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">BUY NOW</a></button>
                                </div>
                           <?php 
                            
                        }?>
                        </div>
                    </div> 
                </div>
                        <!--//col 2  ENDS-->
                        <!--//col 3 starts-->
                           <div class="col-md-4 col-sm-8 col-lg-4">
                    <div class="thumbnail ">
                        <div class="img">  <img  src="IMG/Xiaomi-Mi-10.jpg" class="img-responsive" alt="Xiaomi-Mi-10-Pro"></div>
                        <div class="caption center bimg cpad ">
                            <h3> MI 10 PRO 8/128GB</h3>
                            <p>Price.Rs.54,999</p>
                              <?PHP   IF(isset($_SESSION['email']))                       
                           
                              {  $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='3'
                                             WHERE users.id='$userid' AND items.id=3 AND users_items.status='Added to Cart' ";
 
                                $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
                               
 
                        $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
                             $QTY=$row_fetch=$row_fetch['quantity']; 
                              if($QTY==NULL)
                             {
                                 $QTY=0;
                             }
                                 echo "<h5><strong>QTY IN CART :-</strong> $QTY</h5>";
                              }
                             
                              
                             ?>
                            <!--ENDING QUERRY TO GET QTY-->
                                <?php if (isset($_SESSION['email'])||isset($_SESSION['name']) )
                   
                       {  ?>     
                   
                              <form  action="includes/cartadd.php?id=3 "method="POST">
                                       <label for="quantity"> Quantity</label>
                              <input type="text"   class="form-control"name="quantity" value="1"> 
                   
                              
                <div class="btn-group btn-group-lg buttonedit">
                    
                    <button type="sumbit" class="btn btn-success btn-block "  style="font-variant: small-caps; font-size: 20px;">ADD</button>
                </div> 
                              </form>
               
             <?php  } 
               else     
                            {  ?>
                                
                            <div class="btn-group btn-group-lg buttonedit">
                                <button type="button" class="btn btn-default btn-block " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">BUY NOW</a></button>
                                </div>
                           <?php 
                            
                        }?>
                                
                            
                        </div>
                    </div> 
                </div>
                         <!--//col 3 ENDS-->
                  
            </div>
           
            <!--//ROW 1 END-->
             <!--//ROW 2 START-->
             <div class="row">
                 <!--//col 1 starts-->
                <div class="col-md-4 col-sm-8">
                    <div class="thumbnail">
                        <div class="img"> <img  src="IMG/S20-ultra.jpg" class="img-responsive img " alt="s20 ultra"  > </div>
                        <div class="caption center  bimg cpad">
                            <h3> S20 Ultra 12/128GB</h3>
                            <p>Price.Rs.103,000</p>
                              <?PHP                          
                           IF(isset($_SESSION['email'])) 
                          {   $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='4'
                                             WHERE users.id='$userid' AND items.id=4 AND users_items.status='Added to Cart'";
 
                                $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
                               
 
                        $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
                             $QTY=$row_fetch=$row_fetch['quantity'];  
                              if($QTY==NULL)
                             {
                                 $QTY=0;
                             }
                                   echo "<h5><strong>QTY IN CART :-</strong> $QTY</h5>";
                             }
                             ?>
                           
                                      <!--ENDING QUERRY TO GET QTY-->
                                <?php if (isset($_SESSION['email'])||isset($_SESSION['name']) )
                   
                       {  ?>     
                   
                              <form  action="includes/cartadd.php?id=4 "method="POST">
                                       <label for="quantity"> Quantity</label>
                              <input type="text"   class="form-control"name="quantity" value="1"> 
                   
                              
                <div class="btn-group btn-group-lg buttonedit">
                    
                    <button type="sumbit" class="btn btn-success btn-block "  style="font-variant: small-caps; font-size: 20px;">ADD</button>
                </div> 
                              </form>
               
             <?php  } 
               else     
                            {  ?>
                                
                            <div class="btn-group btn-group-lg buttonedit">
                                <button type="button" class="btn btn-default btn-block " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">BUY NOW</a></button>
                                </div>
                           <?php 
                            
                        }?>
                            
                        </div>
                        
                    </div>
                        
                </div>
                <!--//col 1 ENDS-->
                        <!--//col 2 starts-->
                          <div class="col-md-4  col-sm-8">
                    <div class="thumbnail">
                      
                       <div class="img"> <img  src="IMG/OPPO-Find-X2.jpg" class="img-responsive img " alt="oppo find x2"  > </div>
                        <div class="caption center  bimg cpad">
                            <h3> OPPO-Find-X2 12/256GB</h3>
                            <p>Price.Rs.64,990</p>
                            <!-- querry to get quantity  -->
                              <?PHP       IF(isset($_SESSION['email']))                    
                           
                              { $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='5'
                                             WHERE users.id='$userid' AND items.id=5 AND users_items.status='Added to Cart' ";
 
                                $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
                               
 
                        $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
                             $QTY=$row_fetch=$row_fetch['quantity'];  
                              if($QTY==NULL)
                             {
                                 $QTY=0;
                              }
                                    echo "<h5><strong>QTY IN CART :-</strong> $QTY</h5>";
                                
                             }
                             ?>
                              <!-- ENDING querry to get quantity  -->
                           
                                  <!--ENDING QUERRY TO GET QTY-->
                                <?php if (isset($_SESSION['email'])||isset($_SESSION['name']) )
                   
                       {  ?>     
                   
                              <form  action="includes/cartadd.php?id=5"method="POST">
                                       <label for="quantity"> Quantity</label>
                              <input type="text"   class="form-control"name="quantity" value="1"> 
                   
                              
                <div class="btn-group btn-group-lg buttonedit">
                    
                    <button type="sumbit" class="btn btn-success btn-block "  style="font-variant: small-caps; font-size: 20px;">ADD</button>
                </div> 
                              </form>
               
             <?php  } 
               else     
                            {  ?>
                                
                            <div class="btn-group btn-group-lg buttonedit">
                                <button type="button" class="btn btn-default btn-block " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">BUY NOW</a></button>
                                </div>
                           <?php 
                            
                        }?>
                                
                            
                        </div>
                    </div> 
                </div>
                        <!--//col 2  ENDS-->
                        <!--//col 3 starts-->
                           <div class="col-md-4  col-sm-8">
                    <div class="thumbnail ">
                        <div class="img">  <img  src="IMG/asus-rog-phone-3.jpg" class="img-responsive" alt="asus-rog-phone-3"></div>
                        <div class="caption center bimg cpad ">
                            <h3> Asus-ROG-3 12/25GB</h3>
                            <p>Price.Rs.65,999</p>
                             <!-- querry to get quantity  -->
                              <?PHP                          
                           IF(isset($_SESSION['email'])) 
                           {   $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='6'
                                             WHERE users.id='$userid' AND items.id=6 AND users_items.status='Added to Cart'";
 
                                $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
                               
 
                        $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
                             $QTY=$row_fetch=$row_fetch['quantity'];  
                             if($QTY==NULL)
                             {
                                 $QTY=0;
                             }
                                 echo "<h5><strong>QTY IN CART :-</strong> $QTY</h5>";
                           }
                             ?>
                           
                                    <!--ENDING QUERRY TO GET QTY-->
                                <?php if (isset($_SESSION['email'])||isset($_SESSION['name']) )
                   
                       {  ?>     
                   
                              <form  action="includes/cartadd.php?id=6 "method="POST">
                                       <label for="quantity"> Quantity</label>
                              <input type="text"   class="form-control"name="quantity" value="1"> 
                   
                              
                <div class="btn-group btn-group-lg buttonedit">
                    
                    <button type="sumbit" class="btn btn-success btn-block "  style="font-variant: small-caps; font-size: 20px;">ADD</button>
                </div> 
                              </form>
               
             <?php  } 
               else     
                            {  ?>
                                
                            <div class="btn-group btn-group-lg buttonedit">
                                <button type="button" class="btn btn-default btn-block " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">BUY NOW</a></button>
                                </div>
                           <?php 
                            
                        }?>    
                            
                        </div>
                    </div> 
                </div>
                         <!--//col 3 ENDS-->
                        
                        
                    
            </div>
        
           
                   
               <!--//ROW 2 END-->
               <!--//ROW 3 START-->
        
                 <!--//ROW 3 END-->
               
            
         <!--   //CONTAINER BLOCK END-->
        </DIV>
         <footer>
           <?php include 'includes/footer.php';?>
            
        </footer>
    </body>
</html>
