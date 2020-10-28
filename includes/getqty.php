<?php
function getqty($userid,$items_id)
{    
    
    
    $CON=  mysqli_connect("localhost","root","password","ewebsite")
            or  die(mysqli_error($CON)); 
     $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='$items_id'
WHERE users.id=$userid AND items.id='$items_id'";
 
 $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
 //ending query for product details
 // fetching array to check previoly added quantity
 
 $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
 $row_fetch=$row_fetch['quantity'];
 return $quantity= $row_fetch;
echo "need some work";
}