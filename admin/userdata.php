<?php 
require '../includes/common.php';
IF(isset($_SESSION['admin'])) 
{
                         /*include 'getuserid.php';
                             $userid= userid();*/

//user tableinfo
                   $userinfo=" SELECT users.id AS UserId ,users.email AS UserEmail ,users.name AS UserName FROM `ewebsite`.`users`
";
                 $info_querry= mysqli_query($CON, $userinfo)or die(mysqli_error($CON));
                 //end
               
              /*  $final_profit="   SELECT FORMAT ( (-SUM(items.buyingprice*users_items.quantity)+( SUM(items.price*users_items.quantity)-(10/100)*SUM(items.price*users_items.quantity) )),'0,###.##') AS FinalPrice
                FROM items INNER JOIN users_items   ON users_items.items_id=items.id   WHERE users_items.status='Confirmed'";
                $final_profit_querry=mysqli_query($CON, $final_profit)or die(mysqli_error($CON));
             */
                
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
        <th class="text-center">user ID</th>
       
       
        <th class="text-center">  user email</th>
        <th class="text-center"> username </th>
         <th class="text-center" > Total purchase</th>
        <th class="text-center" > order history</th>

         
        
            
   
        
       
      </tr>
    </thead>
    <tbody>
      
        
       <?php while($info_row=mysqli_fetch_array($info_querry ))
        {   ?> 
      <tr>
          <td class="text-center"><?php $id=$info_row['UserId'];
                                      echo $info_row['UserId'];  
                                            ;?></td>
            <td class="text-center"><?php echo $info_row['UserEmail'];?></td>
          <td class="text-center"><?php echo $info_row['UserName'];  
                                            ;?></td>
          <td class="text-center" > <?php 
            //total purchase made by each user
                 $user_total_pruchase="SELECT SUM(users_items.quantity)As Qtotal FROM users_items
WHERE users_items.user_id='$id';" ;
                 $querry_Qtotal= mysqli_query($CON, $user_total_pruchase) or die(mysqli_error($CON));
                 $Qtotal= mysqli_fetch_array($querry_Qtotal);
                 $Qtotal=$Qtotal['Qtotal'];
                 echo $Qtotal;
                                    ?></td>
         <td  class="text-center">  <?php   
                                            ;?>
             <div class="btn-group-lg" align="center">   <button type="submit" class="btn btn-danger" style= ; margin-right: auto;" > <a href="adminorderhistory.php?id=<?php echo ($id)?> " class="previous "method ="get" style= "color:white  " >OrderHisotry </a></button>
                                </div>  </td>
      
        
       
       
        <?php }?>
      
   
     
     
      
      </tr>
      
      
    </tbody>
  </table>
          

        </DIV>
          <footer>
           <?php include '../includes/footer.php';?>
        </footer>
    </body>
</html>
