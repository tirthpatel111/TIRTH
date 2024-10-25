<?php
session_start();

 if($_SESSION != null)
 {
include "header.php";
echo"User Home";


include "footer.php";
 }
 else
 header("Location: login.php");




 

?>