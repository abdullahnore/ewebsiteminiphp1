<?php

   require '../includes/common.php';
   $Admin_EMAIL='';
   $PASSWORD='';
 
  $Admin_EMAIL= mysqli_real_escape_string($CON,$_POST["admin"]);
        $PASSWORD= mysqli_real_escape_string($CON, md5($_POST["password"]));
    
        //SQL INJECTION
       // $EMAIL= stripcslashes($EMAIL);
       // $PASSWORD= stripcslashes($PASSWORD);
   if (empty($Admin_EMAIL))
   {
         header("location:adminlogin.php");
   } 
     if (empty($PASSWORD))
   {
         header("location:adminlogin.php");
   } 


       
if(!empty ($Admin_EMAIL) && !empty ($PASSWORD))
   
{         
        $LOGIN_QUERY="SELECT * FROM adminlogin WHERE Adminemail='$Admin_EMAIL' AND Adminpassword='$PASSWORD' ";
        $QUERY_RESULT= mysqli_query($CON,$LOGIN_QUERY) or die(mysqli_error($CON));
    
     echo $row_num=mysqli_num_rows($QUERY_RESULT);
      if($row_num==1)
      {
         $_SESSION['admin']=$Admin_EMAIL;
        
         header('location:iteminfo.php');
      }
      else
      {
             header("location:iteminfo.php");
          
      }
   
}
?>
