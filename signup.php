<?php 
require 'includes/common.php';

if(isset($_SESSION['email']))
{
    header("location:product.php");
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
        <title>SIGNUP</title>
           <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
        
         <link rel="stylesheet" href="css/signup.css">
         <link rel="stylesheet" href="css/panelcss.css">
    </head>
    <body>
 <header>
                <?php  include'includes/navbar.php';?>
        </header>
         <article>
            <div class="container npanel spanel">
                <div class="panel panel-danger">
                    <div class="panel-heading  ">
                        <h2 >SIGN-UP</h2>
                        
                    </div>
                    <div class=" panel-body">
                       
                        <form action="userRg.php" method="POST">
                             <?php require "includes/ERRORS.php" ?>
                                  <div class="form-group">
                                    
                                    <input type="text"  class="form-control" name="username" placeholder="username">
                                    
                                
                                </div>
                                <div class="form-group">
                                    
                                    <input type="email"  class="form-control" name="email" placeholder="Email">
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input type="password"  class="form-control" name="password" placeholder="password">
                                    
                                </div>
                                  <div class="form-group">
                                    
                                    <input type="tel"  class="form-control" name="contact" placeholder="Contact">
                                    
                                </div>
                                  <div class="form-group">
                                    
                                    <input type="text"  class="form-control" name="city" placeholder="city">
                                    
                                </div>
                                 <div class="form-group">
                                    
                                    <input type="text"  class="form-control" name="address" placeholder="address">
                                    
                                </div>
                                    
                                <div class="btn-group-lg">
                                <button type="submit" class="btn btn-Defult"> Sumbit </button>
                                </div>
                             </div>
                    <div class=" panel-footer">
                        <p> Already Have an Account? <a href="login.php" > Login </a> </p> 
                    </div>
                    
                            </form>
                            
                      
                    
                    </div>
                   
                    
                </div>
                
            </div>
        </article>
         <footer>
          <?php include 'includes/footer.php';?>
        </footer> 
    </body>
</html>
