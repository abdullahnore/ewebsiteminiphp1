<?php 
require 'includes/common.php';

if(!isset($_SESSION['email']))
{
    header("location:login.php");
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
        <title>Settings</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/panelcss.css">
    </head>
    <body>
    <header>
                <?php include 'includes/navbar.php';?>
        </header>
       <article>
            <div class="container npanel spanel">
                <div class="panel panel-danger">
                    <div class="panel-heading  ">
                        <h2 >Settings</h2>
                        
                    </div>
                    <div class=" panel-body">
                       
                        <form action="includes/update_password.php" method="POST">
                                  <div class="form-group">
                                    
                                      <input type="password"  class="form-control" name="oldpwd" placeholder="OldPassword">
                                    
                                </div>
                                  <div class="form-group">
                                    
                                    <input type="password"  class="form-control" name="newpwd" placeholder="NewPassword">
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input type="password"  class="form-control" name="cnewpwd" placeholder="Confirm-NewPassword">
                                    <br> 
                                    <?PHP IF(isset($_SESSION['true']))
                                    {?>
                                    <div >
                                    <?php  if(!empty($_SESSION['error']))
                                    {?>
                                        <P> <?PHP ECHO $ERROR= $_SESSION['error'];
                                            ?> </p>
                                    <?PHP }
                                    ?>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                                    
                                
                                <div class="btn-group-lg">
                                <button type="submit" class="btn btn-Defult "> Sumbit </button>
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
