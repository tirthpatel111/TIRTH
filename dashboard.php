<?php
// session_start();

// echo "admin";

 ?>
 <?php
  include "adminheader.php";
   session_start();
   if(!isset($_SESSION["id"]))
   {
      header("Location:login.php");
      die();
   }
   include "footer.php";
?>