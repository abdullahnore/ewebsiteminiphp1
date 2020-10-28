

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
  
    </head>
    <body>
    

 

        
          <header>
             <nav class=" navbar  navbar-expand-sm navbar-default nmargin" >
            <div class=" container">
                <div class="navbar-header ">
                    <ul type= none>
                        <li>
                             <a  href="index.php" class=" navbar-brand"> LifeStyLe </a>
                        </li>                       
                        
                    </ul>
                   
                    
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navcollapse"> <span class="glyphicon glyphicon-menu-hamburger"> </span> </button>
                </div>
                                    
                
                
                 <ul type="none" class="nav navbar-nav ">
                     <li    > <a href="index.php"><span class="glyphicon glyphicon-home"></span> HOME </a> </li>
                    </ul>
                
            
                 <div class="collapse navbar-collapse navvis" id="navcollapse">
               
                        <ul class=" nav navbar-nav navbar-right " type=none >
                            <?php if (isset(($_SESSION['admin']))) 
                            {?> <li  > <a href="logout.php" name="../admin/logout" style="font-variant: small-caps"> <span class="glyphicon glyphicon-log-in"	> </span>Logout</a></li>
                            
                            <?php } ?>
                            
                              <?php  if (isset($_SESSION['email'])&&(!isset($_SESSION['admin'])) )
                              
               {   ?> 
               <li>  <a href="cart.php" style="font-variant: small-caps"> <span class="glyphicon glyphicon-shopping-cart"> </span> cart </a></li>    
                             <li    ><a href="settings.php" style="font-variant: small-caps"> <span class="glyphicon glyphicon-cog"> </span> Settings  </a></li>
                            <li  > <a href="logout.php" name="logout" style="font-variant: small-caps"> <span class="glyphicon glyphicon-log-in"	> </span>Logout</a></li>
                            
                      <?php }?>
                 
             <?php if (!isset($_SESSION['email'])&&(!isset($_SESSION['admin'])) )
                { ?>
                  
                            <li   ><a href="admin/adminlogin.php" style="font-variant: small-caps"> <span class="glyphicon glyphicon-user"> </span> AdminLogin</a></li>
                            <li   ><a href="signup.php" style="font-variant: small-caps"> <span class="glyphicon glyphicon-user"> </span> Signup </a></li>
                            <li  > <a href="login.php" style="font-variant: small-caps"> <span class="glyphicon glyphicon-log-in"	> </span> Login </a></li>
                             
               
              <?php  } ?>    
                 </ul>
                 </div>
              
             </div>
                </nav>
        </header>
     
    </body>
</html>