<?php
session_start();
$CON=  mysqli_connect("localhost","root","password","ewebsite")
            or  die(mysqli_error($CON)); 
    include 'getuserid.php';
    include 'getqty.php';
    $quantity='';
 $userid= userid();
$items_id=$_GET['id'];
 $quantity=$_POST['quantity'];
//quering product details
$userid= userid();

 $SELECT_QUERY= "SELECT users.id ,items.id,users_items.quantity,items.name FROM users INNER JOIN users_items ON users_items.user_id='$userid' RIGHT JOIN items ON users_items.items_id='$items_id' 
  WHERE users.id=$userid  AND items.id='$items_id' AND users_items.status='Added to Cart' ";
 
 $SELECT_QUERY_RESULT= mysqli_query($CON, $SELECT_QUERY) or die(mysqli_error($CON));
 //ending query for product details
 // fetching array to check previoly added quantity
 
 $row_fetch=mysqli_fetch_array($SELECT_QUERY_RESULT);
 $row_fetch=$row_fetch['quantity'];


//fetching array to check previoly added quantity
//CHECKING IF ITEM HAS ALREADY BEEN ADDED
$row=mysqli_num_rows($SELECT_QUERY_RESULT);
if($row>=1)
{      if($row_fetch>0)
{
    $quantity+=$row_fetch;
}
    $INSERT_UPDATE_QUERY=" UPDATE users_items
SET quantity ='$quantity'
WHERE items_id='$items_id' AND user_id='$userid'AND users_items.status='Added to Cart'";
   mysqli_query($CON, $INSERT_UPDATE_QUERY)or die(mysqli_error($CON));
     header("location:../product.php");
  
}
 else {
    


 $INSERT_QUERY =" INSERT INTO users_items(user_id,items_id,status,quantity) VALUES ('$userid','$items_id','Added to Cart','$quantity' ) ";
 mysqli_query($CON, $INSERT_QUERY)or die(mysqli_error($CON));

  header("location:../product.php");

 }
 //ENDING THE ADD TO CAR INSERT


/*MariaDB/ewebsite/users/		http://localhost/phpmyadmin/tbl_sql.php?db=ewebsite&table=items
 Showing rows 0 -  1 (2 total, Query took 0.0008 seconds.)

SELECT users.id ,items.id,users_items.quantity,items.price,items.name FROM users INNER JOIN users_items ON users_items.user_id=users.id RIGHT JOIN items ON users_items.items_id=items.id
WHERE users.id=1


id	id	quantity	price	name	
1	1	6	54999	ONEPLUS 8 PRO 8/128GB	
1	2	2	44999	ONEPLUS 8 8/128GB
	
*/
