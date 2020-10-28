<?php

   require 'includes/common.php';
   $EMAIL='';
   $PASSWORD='';
 
  $EMAIL= mysqli_real_escape_string($CON,$_POST["email"]);
        $PASSWORD= mysqli_real_escape_string($CON, md5($_POST["password"]));
    
        //SQL INJECTION
       // $EMAIL= stripcslashes($EMAIL);
       // $PASSWORD= stripcslashes($PASSWORD);
   if (empty($EMAIL))
   {
         header("location:login.php");
   } 
     if (empty($PASSWORD))
   {
         header("location:login.php");
   } 


       
if(!empty ($EMAIL) && !empty ($PASSWORD))
   
{         
        $LOGIN_QUERY="SELECT * FROM users WHERE email='$EMAIL ' AND password='$PASSWORD' ";
        $QUERY_RESULT= mysqli_query($CON,$LOGIN_QUERY) or die(mysqli_error($CON));
    
     echo $row_num=mysqli_num_rows($QUERY_RESULT);
      if($row_num==1)
      {
         $_SESSION['email']=$EMAIL;
        
         header('location:product.php');
      }
      else
      {
             header("location:login.php");
          
      }
   
}
?>
