<?php
session_start();
include 'getuserid.php';
$CON=  mysqli_connect("localhost","root","password","ewebsite")
            or  die(mysqli_error($CON)); 
 $id=$_GET['id'];
 
      $userid= userid();
      //Querry to check if cart is Empty 
                $SELECT_CHECK_CART_EMPTY="SELECT *FROM users_items WHERE user_id='$userid' AND users_items.status='Added to Cart'";
                $CHECK_CART_EMPTY= mysqli_query($CON,$SELECT_CHECK_CART_EMPTY) or die(mysqli_error($CON));
                $NUM_ROWS_IN_CART= mysqli_num_rows($CHECK_CART_EMPTY);
            if($id=='ALL')
            {      if($NUM_ROWS_IN_CART>=1)
            {   echo"hi"; $INSERT_DELETE_INDIVIDUAL="DELETE FROM users_items WHERE users_items.status='Added to Cart' AND users_items.user_id='$userid'";
             mysqli_query($CON, $INSERT_DELETE_INDIVIDUAL) or die(mysqli_error($CON)) ;
            header("location:../cart.php");
            
            }}
            
               
        
           if($id=='CONFIRM')
            {  
                
                if($NUM_ROWS_IN_CART>=1)
                { 
            
            header("location:paymentpage.php");
         
                }
else {
      header("location:emptycart.php");
            }
            } else {
            $INSERT_DELETE_INDIVIDUAL="DELETE FROM users_items WHERE users_items.items_id='$id'AND users_items.status='Added to Cart'";
             mysqli_query($CON, $INSERT_DELETE_INDIVIDUAL)or die(mysqli_error($CON));
                  header("location:../cart.php"); 
                  }
        

