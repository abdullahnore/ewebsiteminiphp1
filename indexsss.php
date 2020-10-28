<?php
session_start();
include 'includes/getuserid.php';
 $CON=  mysqli_connect("localhost","root","password","ewebsite") or
         die(mysqli_error($CON));
 $userid= userid();
 $SELECT_QUERY= "SELECT users.id AS UserID,items.id AS ItemIId ,users.name,items.name AS ProductName ,items.price,users_items.quantity FROM users
INNER JOIN items ON users.id=items.id INNER JOIN users_items ON users_items.user_id=users.id WHERE users.id=$userid";
 $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
$row= mysqli_fetch_array($SELECT_QUERY_RESULT);
ECHO mysqli_num_rows($SELECT_QUERY_RESULT);

?>