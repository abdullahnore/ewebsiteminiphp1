<?php 
require 'includes/common.php';


?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>INDEX</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/indexcss.css">
       <style>
  /*  responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
   
  
    </head>
    <body>
        
        <header>
            
               <?php 
               include 'includes/navbar.php'; ?>
        </header>
        
        <article>
            <div class="container nbanner ">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div >
                      
                        <div class="container">
                           
                            <div class="banner_content">
                                <?php  if (isset($_SESSION['email']) )
                              
               {    ?>
                                <div class="btn-group btn-group-lg">
                                    <button type="button" class="btn btn-default " style="font-variant: small-caps; font-size: 20px;"><a href="product.php">SHOP</a></button>
                                </div> <?php } ?>
                                <?php  if (!isset($_SESSION['email'])&&isset($_SESSION['admin']) )
                                 { ?>
                                <div class="btn-group btn-group-lg">
                                    <button type="button" class="btn btn-warning " style="font-variant: small-caps; font-size: 20px;"><a href="admin/iteminfo.php">Sales</a></button>
                                </div>
                                
                               <?php }?>
                                 <?php  if (!isset($_SESSION['email'])&&!isset($_SESSION['admin']) )
                                 { ?>
                                <div class="btn-group btn-group-lg">
                                    <button type="button" class="btn btn-default " style="font-variant: small-caps; font-size: 20px;"><a href="login.php">SHOP</a></button>
                                </div>
                                
                               <?php }?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            </div>
            
            
        </article>
        <footer>
           <?php include 'includes/footer.php';?>
        </footer>
    </body>
</html>
