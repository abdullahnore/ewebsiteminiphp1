<?php





function check_if_added_to_cart($items_id)
{
   $CON=  mysqli_connect("localhost","root","password","ewebsite")
            or  die(mysqli_error($CON));
    session_start();
   $EMAIL=$_SESSION['email'];
$LOGIN_QUERY="SELECT id FROM users WHERE email='$EMAIL ' ";
 $QUERY_RESULT= mysqli_query($CON,$LOGIN_QUERY) or die(mysqli_error($CON));
$row= mysqli_fetch_array($QUERY_RESULT);
$user_id=$row['id'];

   $QUERY_SELECT="SELECT user_id,items_id FROM user_items WHERE user_id='$user_id' and items_id='$items_id'and status='ADDED to Cart' ";
   $RESUTLS= mysqli_query($CON, $QUERY_SELECT) or die(mysqli_errno($CON));
   /*if(mysqli_num_rows($RESUTLS)>=1)
   { 
   return 1;
   
   }
   else
   {
    return 0;
   }*/
   
    
}
