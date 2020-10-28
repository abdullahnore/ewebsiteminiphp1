<?php


function userid()
{
$CON=  mysqli_connect("localhost","root","password","ewebsite")
            or  die(mysqli_error($CON)); 
 
$EMAIL=$_SESSION['email'];
$LOGIN_QUERY="SELECT id FROM users WHERE email='$EMAIL ' ";
 $QUERY_RESULT= mysqli_query($CON,$LOGIN_QUERY) or die(mysqli_error($CON));
$row= mysqli_fetch_array($QUERY_RESULT);
return $user_id=$row['id'];

}
