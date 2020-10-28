<?php 
require 'includes/common.php';
IF(isset($_SESSION['email'])) 
{
                         include 'includes/getuserid.php';
                             $userid= userid();


         //getting product and user info
        
        $NAME_SELECT="SELECT items.name AS ItemName ,FORMAT (items.price,'0,###.##') AS price ,users_items.quantity AS quanity,items.id AS ItemsId FROM users INNER JOIN users_items ON users_items.user_id=$userid RIGHT JOIN items ON users_items.items_id=items.id
WHERE users.id='$userid' AND users_items.status='Added to Cart' ";
        $NAME_QUERRY= mysqli_query($CON, $NAME_SELECT)or die(mysqli_error($CON));
        //CALCULATING INDIVIDUAL PRICE OF ITEMS
        $SELECT_PRICE_OF_INDVIDUAL_QUANTITY="SELECT FORMAT (items.price*users_items.quantity,'0,###.##') AS SubTotal
FROM items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Added to Cart'";
        $QUERY_TOTAL_PRICE_OF_INDVIDUAL_QUANTITY= mysqli_query($CON, $SELECT_PRICE_OF_INDVIDUAL_QUANTITY)or die(mysqli_error($CON));
       
                ///ENDING QUERY OF PRICE ITEMS
          //CALCULATING GRAND PRICE OF ITEMS
        $SELECT_QUERY_FOR_GRAND_TOTAL="SELECT FORMAT (SUM(items.price*users_items.quantity),'0,###.##') AS GrandTotal FROM"
                . " items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Added to Cart'";
        $QUERY_FOR_GRAND_TOTAL= mysqli_query($CON, $SELECT_QUERY_FOR_GRAND_TOTAL)or die(mysqli_error($CON));
        $GRAND_TOTAL= mysqli_fetch_array($QUERY_FOR_GRAND_TOTAL);
          ///ENDING QUERY OF GRAND PRICE
         //discount querey
              $SELECT_QUERY_FOR_GRAND_TOTAL_DISCOUNT=" SELECT FORMAT (-(10/100)*SUM(items.price*users_items.quantity),'0,###.##') AS Discount FROM "
                      . "items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Added to Cart'";
              $QUERY_FOR_GRAND_TOTAL_DISCOUNT= mysqli_query($CON, $SELECT_QUERY_FOR_GRAND_TOTAL_DISCOUNT)or die(mysqli_error($CON));
        $GRAND_TOTAL_DISCOUNT= mysqli_fetch_array($QUERY_FOR_GRAND_TOTAL_DISCOUNT);
        $discount=  $GRAND_TOTAL_DISCOUNT['Discount'];
        // Final price query
        $Select_final_price="SELECT FORMAT ((-(10/100)*SUM(items.price*users_items.quantity)+SUM(items.price*users_items.quantity)),'0,###.##') AS FinalPrice "
                . "FROM items INNER JOIN users_items ON items_id= items.id WHERE users_items.user_id='$userid' AND users_items.status='Added to Cart'";
      $QUERY_FINAL_PRICE= mysqli_query($CON, $Select_final_price)or die(mysqli_errno($CON));
      $FETCH_FINAL_PRICE= mysqli_fetch_array($QUERY_FINAL_PRICE);
              $final_price=$FETCH_FINAL_PRICE['FinalPrice'];
                      //getting the item id
}
else 
    
 { header("location:login.php");
     
     
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
        <title>Cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
         <link rel="stylesheet" href="css/cart.css">
   
    </head>
    <body>
        <header>
         <header>
                <?php include 'includes/navbar.php';?>
        </header>
        </header>
        <DIV class="container ">
            <!--CONTAINER START-->
      <table class="table table-dark table-bordered font  ">
    <thead>
      <tr>
        <th class="text-center">item Qty</th>
       
        <th class="text-center"> Item Name</th>

        <th class="text-center" >Price</th>
        <th class="text-center">Sub Total </th>
        <th  class="text-center" >
        <div  class="btn-group-md">
            <button type="submit" class="btn btn-danger" style= ; margin-right: auto;" > <a href="includes/cartremove_confirm.php?id=ALL" method ="get" style= "color:white  " >DELETE ALL </a></button>
                                </div>  </th>
      </tr>
    </thead>
    <tbody>
      
        
       <?php while($NAME_ROW=mysqli_fetch_array($NAME_QUERRY ))
        {   ?> 
      <tr>
          <td class="text-center"><?php echo $NAME_ROW['quanity'];  
                                            ;?></td>
        <td class="text-center"><?php echo $NAME_ROW['ItemName'];?></td>
         <td  class="text-center"> Rps <?php echo $NAME_ROW['price']; ?> </td>
         
        <td class="text-center">
        <?php  $SubTotal= mysqli_fetch_array($QUERY_TOTAL_PRICE_OF_INDVIDUAL_QUANTITY);
        $SubTotal=$SubTotal['SubTotal'];
        
        echo"Rps $SubTotal";?>  </td>
        <td class="text-center"> <?php   $items_id=$NAME_ROW['ItemsId'] ?>
        <div  class="btn-group-sm">
            <button type="submit" class="btn btn-danger" style= ; margin-right: auto;" > <a href="includes/cartremove_confirm.php?id=<?php echo $items_id?>" method ="get" style= "color:white  " >DELETE </a></button>
                                </div> 
        </td>
       
        <?php }?>
      
        
        
      
      <tr>
        <td></td>
          <td> </td>
          <td class="text-center">GrandTotal<b> </b><hr><strong>Discount  </strong><hr><b>FinalPrice </b></td>
        <td> <?php if(empty($GRAND_TOTAL))
        {     echo 'NULL'; 
        
        } else {
          
         $GRAND_TOTAL=$GRAND_TOTAL['GrandTotal'];
      
     
      
       echo  '<p class="text-center">Rps '.$GRAND_TOTAL .'</p>';
        echo"<hr>";
        echo'<p class="text-center">Rps '.$discount .'</p>';
            echo"<hr>";
        echo '<p class="text-center">Rps '.$final_price .'</p>';
         
    
        }   ?>
        
            
        </td>
      
        <td  class="text-center" > <div  class="btn-group-lg ">
                <br>
                <br>
                <button type="submit" class="btn btn-primary"  > <a href="includes/cartremove_confirm.php?id=CONFIRM" style= "color:white  " > Confirm order </a></button>
                                </div>
            <hr>
            <div class="btn-group-lg "  >   <button type="submit" class="btn btn-warning" style= ; margin-right: auto;" > <a href="includes/orderhistory.php"  "method ="get" style= "color:white  " >Order history </a></button>
                                </div>  
         </td>
     
     
      
      </tr>
    </tbody>
  </table>
   
        </DIV>
          <footer>
           <?php include 'includes/footer.php';?>
        </footer>
    </body>
</html>
