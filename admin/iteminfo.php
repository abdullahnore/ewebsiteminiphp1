<?php 
require '../includes/common.php';
IF(isset($_SESSION['admin'])) 
{
                         /*include 'getuserid.php';
                             $userid= userid();*/

//items tableinfo
                   $item_info=" SELECT  id AS Id, name AS Name,FORMAT(buyingprice,'0,###.##')AS BuyingPrice,FORMAT(price,'0,###.##') AS Price
FROM items";
                 $info_querry= mysqli_query($CON, $item_info)or die(mysqli_error($CON));
              /*  $final_profit="   SELECT FORMAT ( (-SUM(items.buyingprice*users_items.quantity)+( SUM(items.price*users_items.quantity)-(10/100)*SUM(items.price*users_items.quantity) )),'0,###.##') AS FinalPrice
                FROM items INNER JOIN users_items   ON users_items.items_id=items.id   WHERE users_items.status='Confirmed'";
                $final_profit_querry=mysqli_query($CON, $final_profit)or die(mysqli_error($CON));*/
                
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
        <th class="text-center">ITEM ID</th>
       
       
        <th class="text-center"> Item Name</th>

        <th class="text-center" > buying Price</th>

          <th class="text-center"> selling  price </th>
        
            
   
        
       
      </tr>
    </thead>
    <tbody>
      
        
       <?php while($info_row=mysqli_fetch_array($info_querry ))
        {   ?> 
      <tr>
          <td class="text-center"><?php echo $info_row['Id'];  
                                            ;?></td>
          <td class="text-center"><?php echo $info_row['Name'];  
                                            ;?></td>
        <td class="text-center"><?php echo $info_row['BuyingPrice'];?></td>
         <td  class="text-center"> Rps <?php echo $info_row['Price']; ?> </td>
      
        
       
       
        <?php }?>
      
   
     
     
      
      </tr>
      <tr>
          <Td> </Td>
          <td>     </td>
            <td>     </td>
          
                <td>    <div class="btn-group-lg" align="center">   <button type="submit" class="btn btn-danger" style= ; margin-right: auto;" > <a href="profit.php " class="previous "method ="get" style= "color:white  " >Sales </a></button>
                                </div>     </td>
      </tr>
      
    </tbody>
  </table>
          

        </DIV>
          <footer>
           <?php include '../includes/footer.php';?>
        </footer>
    </body>
</html>
