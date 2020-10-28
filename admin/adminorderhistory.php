<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 

require '../includes/common.php';
IF(isset($_SESSION['admin'])) 
{
       $userid= ($_GET['id']);
                   

         //getting product and user info
        
        $NAME_SELECT="SELECT items.name AS ItemName ,FORMAT (items.price,'0,###.##') AS price ,users_items.id AS OrderId,users_items.quantity AS Quantity,items.id AS ItemsId,users_items.TIME FROM users INNER JOIN users_items ON users_items.user_id=$userid RIGHT JOIN items ON users_items.items_id=items.id
WHERE users.id='$userid' AND users_items.status='Confirmed' ";
        $NAME_QUERRY= mysqli_query($CON, $NAME_SELECT)or die(mysqli_error($CON));
        //CALCULATING INDIVIDUAL PRICE OF ITEMS
        $SELECT_PRICE_OF_INDVIDUAL_QUANTITY="SELECT FORMAT (items.price*users_items.quantity,'0,###.##') AS SubTotal
FROM items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Confirmed'";
        $QUERY_TOTAL_PRICE_OF_INDVIDUAL_QUANTITY= mysqli_query($CON, $SELECT_PRICE_OF_INDVIDUAL_QUANTITY)or die(mysqli_error($CON));
       
                ///ENDING QUERY OF PRICE ITEMS
          //CALCULATING GRAND PRICE OF ITEMS
        $SELECT_QUERY_FOR_GRAND_TOTAL="SELECT FORMAT (SUM(items.price*users_items.quantity),'0,###.##') AS GrandTotal FROM"
                . " items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Confirmed'";
        $QUERY_FOR_GRAND_TOTAL= mysqli_query($CON, $SELECT_QUERY_FOR_GRAND_TOTAL)or die(mysqli_error($CON));
        $GRAND_TOTAL= mysqli_fetch_array($QUERY_FOR_GRAND_TOTAL);
          ///ENDING QUERY OF GRAND PRICE
         //discount querey
              $SELECT_QUERY_FOR_individual_TOTAL_DISCOUNT=" SELECT FORMAT (-(10/100)*(items.price*users_items.quantity),'0,###.##') AS Discount FROM "
                      . "items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Confirmed'";
              $QUERY_FOR_individual_TOTAL_DISCOUNT= mysqli_query($CON, $SELECT_QUERY_FOR_individual_TOTAL_DISCOUNT)or die(mysqli_error($CON));
  
    
        // Final price query
        $Select_individual_final_price="SELECT users_items.id, FORMAT ((-(10/100)*(items.price*users_items.quantity)+(items.price*users_items.quantity)),'0,###.##') AS FinalPrice 
                FROM items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id=$userid AND users_items.status='Confirmed'";
      $QUERY_individual_FINAL_PRICE= mysqli_query($CON, $Select_individual_final_price)or die(mysqli_errno($CON));
     
            
                      //getting the item id
}
else 
    
 { header("location:../login.php");
     
     
 } 
          
          ?>
       
        



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Order history</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
         <link rel="stylesheet" href="../css/cart.css">
          <link rel="stylesheet" href="../css/footer.css">
   
    </head>
    <body>
        <header>
         <header>

             <hr>
        </header>
        </header>
        <DIV class="container ">
            <!--CONTAINER START-->
      <table class="table table-dark table-bordered font  ">
    <thead>
      <tr>
        <th class="text-center">ORDER ID</th>
       
        <th class="text-center"> Quanity</th>
        <th class="text-center"> Item Name</th>

        <th class="text-center" >Price</th>
 <th class="text-center">subtotal </th>
    <th class="text-center">discount </th>
          <th class="text-center">Final price </th>
         <th class="text-center">TIME-STAMP </th>
        
       
      </tr>
    </thead>
    <tbody>
      
        
       <?php while($NAME_ROW=mysqli_fetch_array($NAME_QUERRY ))
        {   ?> 
      <tr>
          <td class="text-center"><?php echo $NAME_ROW['OrderId'];  
                                            ;?></td>
          <td class="text-center"><?php echo $NAME_ROW['Quantity'];  
                                            ;?></td>
        <td class="text-center"><?php echo $NAME_ROW['ItemName'];?></td>
         <td  class="text-center"> Rps <?php echo $NAME_ROW['price']; ?> </td>
         
      <td class="text-center">
        <?php  $SubTotal= mysqli_fetch_array($QUERY_TOTAL_PRICE_OF_INDVIDUAL_QUANTITY);
        $SubTotal=$SubTotal['SubTotal'];
        
        echo"Rps $SubTotal";?>  </td>
       <td class="text-center">
        <?php  $discount=mysqli_fetch_array($QUERY_FOR_individual_TOTAL_DISCOUNT);
        $discount=$discount['Discount'];
        
        echo"Rps $discount";?>  </td>
        <td class="text-center">
        <?php  $FinalTotal= mysqli_fetch_array($QUERY_individual_FINAL_PRICE);
        $FinalTotal=$FinalTotal['FinalPrice'];
        
        echo"Rps $FinalTotal";?>  </td>
         <td class="text-center"><?php echo $NAME_ROW['TIME'];?></td>
        
       
       
        <?php }?>
      
        
        
      
    
        
     
      
     
     
      
      </tr>
    </tbody>
  </table>
            <div class="btn-group-lg">   <button type="submit" class="btn btn-danger" style= ; margin-right: auto;" > <a href="userdata.php"  class="previous "method ="get" style= "color:white  " >Back </a></button>
                                </div>  

        </DIV>
          <footer>
           <?php include '../includes/footer.php';?>
        </footer>
    </body>
</html>
