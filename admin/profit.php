<?php 
require '../includes/common.php';
IF(isset($_SESSION['admin'])) 
{
                         /*include 'getuserid.php';
                             $userid= userid();*/

//items tableinfo
                   $Profit_info=" SELECT users_items.user_id AS UserId, users_items.quantity AS Quantity, users_items.id AS OrderId, name AS Name,FORMAT(buyingprice,'0,###.##')AS BuyingPrice,FORMAT((-10/100)*price+price,'0,###.##') AS Price
FROM items RIGHT JOIN users_items ON users_items.items_id=items.id WHERE users_items.status='Confirmed'";
               
                 $Profit_querry= mysqli_query($CON, $Profit_info)or die(mysqli_error($CON));
                 //end
                     //individual profit
                 $individual_profit="SELECT FORMAT ( (-(items.buyingprice*users_items.quantity)+( (items.price*users_items.quantity)-(10/100)*(items.price*users_items.quantity) )),'0,###.##') AS Profit
                FROM items INNER JOIN users_items   ON users_items.items_id=items.id   WHERE users_items.status='Confirmed'";
                  $individual_Profit_querry= mysqli_query($CON,$individual_profit)or die(mysqli_error($CON));
                  //end
                  //final profit querry
               $final_profit="   SELECT FORMAT ( (-SUM(items.buyingprice*users_items.quantity)+( SUM(items.price*users_items.quantity)-(10/100)*SUM(items.price*users_items.quantity) )),'0,###.##') AS FinalProfit
                FROM items INNER JOIN users_items   ON users_items.items_id=items.id   WHERE users_items.status='Confirmed'";
                $final_profit_querry=mysqli_query($CON, $final_profit)or die(mysqli_error($CON));
                //end
                //total product sold 
                $total_product_sold="SELECT SUM(users_items.quantity) AS ProductSold FROM users_items WHERE users_items.status='Confirmed'";
                $total_product_querry= mysqli_query($CON, $total_product_sold)or die(mysqli_errno($CON));
                
                
}
else 
    
 { header("location:adminlogin.php");
     
     
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
                <?php include 'adminnavbar.php'; ?>
         <header>

             <hr>
        </header>
        </header>
        <DIV class="container ">
            <!--CONTAINER START-->
      <table class="table table-dark table-bordered font  ">
    <thead>
      <tr>
        <th class="text-center">Order ID</th>
        <th class="text-center">UserId</th>
       
       
        <th class="text-center"> Item Name</th>

        <th class="text-center" > buying Price</th>

          <th class="text-center"> selling  price </th>
           <th class="text-center"> Quantity </th>
            <th class="text-center"> Profit</th>
        
            
   
        
       
      </tr>
    </thead>
    <tbody>
      
        
       <?php while($Profit_row=mysqli_fetch_array($Profit_querry ))
        {   ?> 
      <tr> 
          <td class="text-center"><?php echo $Profit_row['OrderId'];  
                                            ;?></td>
          <td class="text-center"><a href="#"><?php echo $Profit_row['UserId'];  
          ;?></a></td>
          <td class="text-center"><?php echo $Profit_row['Name'];  
                                            ;?></td>
        <td class="text-center"><?php echo $Profit_row['BuyingPrice'];?></td>
        
         <td  class="text-center"> Rps <?php echo $Profit_row['Price']; ?> </td>
         <td class="text-center"><?php echo $Profit_row['Quantity'];?></td>
      
        <td class="text-center">
        <?php  $row= mysqli_fetch_array($individual_Profit_querry);
        $row=$row['Profit'];
        echo " Rps $row ";
        ?> </td>
       
       
        <?php }?>
      
   
     
     
      
      </tr>
      <tr>
          <Td class="text-center"><div class="btn-group-lg" align="center">   <button type="button" class="btn btn-primary" style= ; margin-right: auto;" > <a href="iteminfo.php " class="previous "method ="get" style= "color:white  " >ProductInfo </a></button>
                                </div> </Td>
          <td>     </td>
                <td>     </td>
            <td>     </td>
            <td class="text-center"> Totalprofit <hr>totalProductSold</td>
            <td class="text-center">   <?php  $final_profit_row= mysqli_fetch_array($final_profit_querry);
        $final_profit_row=$final_profit_row['FinalProfit'];
        echo " Rps $final_profit_row";
        
        ?> <hr>
        <?php  $sumofproduct_row= mysqli_fetch_array($total_product_querry);
        $sumofproduct_row=$sumofproduct_row['ProductSold'];
        echo  $sumofproduct_row;
        
        ?>
           
      </tr>
      
    </tbody>
  </table>
          

        </DIV>
          <footer>
           <?php include '../includes/footer.php';?>
        </footer>
    </body>
</html>

