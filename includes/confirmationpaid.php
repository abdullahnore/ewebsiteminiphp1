<?php
session_start();
include 'getuserid.php';
$CON=  mysqli_connect("localhost","root","password","ewebsite")
            or  die(mysqli_error($CON)); 

 
      $userid= userid();
      //Querry to check if cart is Empty 
                $SELECT_CHECK_CART_EMPTY="SELECT *FROM users_items WHERE user_id='$userid' AND users_items.status='Added to Cart'";
                $CHECK_CART_EMPTY= mysqli_query($CON,$SELECT_CHECK_CART_EMPTY) or die(mysqli_error($CON));
                $NUM_ROWS_IN_CART= mysqli_num_rows($CHECK_CART_EMPTY);
                
                 if($NUM_ROWS_IN_CART>=1)
                 {
            $CONFRIM_ORDER_QUERRY= " UPDATE users_items SET users_items.status='Confirmed '   WHERE users_items.user_id='$userid' AND users_items.status='Added to Cart'";
            mysqli_query($CON, $CONFRIM_ORDER_QUERRY) or die(mysqli_error($CON));
            header("location:success.php");
         
                }
                else
                {
                         header("location:emptycart.php");
                }
                
