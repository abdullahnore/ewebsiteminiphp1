<?php
include 'common.php';
IF(isset($_SESSION['email'])) 
{
    $oldpassword=md5($_POST['oldpwd']);
    $newpassword=md5($_POST['newpwd']);
    $confirmnewpassword=md5($_POST['cnewpwd']);
                         include 'getuserid.php';
                             $userid= userid();
                             
                         
                          if(!empty($oldpassword)&&!empty($newpassword)&&!empty($confirmnewpassword))
                          {  
                               $OLD_QUERY="SELECT users.password FROM users WHERE users.id='$userid'";
                             $OLD_QUERY_RESULTS= mysqli_query($CON, $OLD_QUERY);
                             $FETCH_OLDPASSWORD= mysqli_fetch_array($OLD_QUERY_RESULTS)or die(mysqli_error($CON));
                              $OLD_PASSWORD_FETCHED= $FETCH_OLDPASSWORD['password'];
                              
                              if($OLD_PASSWORD_FETCHED===$oldpassword)
                              {
                                  if($newpassword===$confirmnewpassword)
                                  {
                                       $SELECT_UPDATE_QUERY="UPDATE users SET users.password='$confirmnewpassword' WHERE users.id='$userid'";
                                       $PASSWORD_UPDATE_QUERRY= mysqli_query($CON, $SELECT_UPDATE_QUERY)or die(mysqli_errno($CON));
                                           header("location:password_updated_succesfully.php");
                                  
                                       
                                  } 
                                     else {
                                         $_SESSION['error']= $NEW_PASSWORD_ERROR="CONFIRMATION PASSWORD DOES NOT MATCH!";
                                          header("location:../settings.php");
                                     }
                              } ELSE
                              {
                                  $OLD_PASSWORD_ERROR="INCORRECT OLD PASSWORD!";
                                  header("location:../settings.php");
                                  
                              }
                          }
 else {
     $_SESSION['true']=true;
      $_SESSION['error']= "More Than one input Fields Are Empty!";
       header("location:../settings.php");
 }
}
