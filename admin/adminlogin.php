<?php 
require '../includes/common.php';

if(isset($_SESSION['admin']))
{
    header("location:iteminfo.php");
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
        <title>AdminLOG IN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
         <link rel="stylesheet" href="../css/logincss.css">
         <link rel="stylesheet" href="../css/panelcss.css">
            <link rel="stylesheet" href="../css/footer.css">
    
    </head>
    <body>
      <header>
              
        </header>
        <article>
            <div class="container npanel spanel">
                <div class="card bg-dark text-white">
                    <div class="card-header  ">
                        <h2 >LOGIN</h2>
                        
                    </div>
                    <div class=" card-body">
                       
                        <form action="adminlogproccess.php"  method="POST">
                            
                                <div class="form-group">
                                    <label for="admin"> Email:</label>
                                    <input type="text"  class="form-control" name="admin" placeholder="AdminEmail">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="password"> Password:</label>
                                    <input type="password"  class="form-control" name="password" placeholder="password">
                                    
                                </div>
                                <div class="btn-group-lg">
                                <button type="submit" class="btn btn-danger"> Login </button>
                                </div>
                            </form>
                            
                      
                    
                    </div>
                    <div class=" card-footer">
                        <p> Not an Admin? <a href="../login.php" > Customer Login </a> </p> 
                    </div>
                    
                </div>
                
            </div>
        </article>
         <footer>
           <?php include '../includes/footer.php';?>
        </footer>
    </body>
</html>
