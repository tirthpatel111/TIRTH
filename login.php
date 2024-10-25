<?php
#require("conn.php");

session_start();
$conn = mysqli_connect('localhost','root','','test') or die('connection failed');

$email = $_POST["email"];
$pass = $_POST["pass"];
$role = $_POST["u_type"]; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "test";


$conn = mysqli_connect($servername, $username, $password, $database) or die("Error connecting to database");

$que = "SELECT * FROM register WHERE Email = '$email' AND pass = '$pass'";
$a = mysqli_query($conn, $que);

if (mysqli_num_rows($a) == 1) {
    $data = mysqli_fetch_assoc($a);
    

    

    $id = $data['id']; 
    $_SESSION['id'] = $id;
    $_SESSION['idx'] = $id;
    // echo $_SESSION['id'];


    $log_login_sql = "INSERT INTO audit_table  VALUES ('','$id', CURRENT_TIMESTAMP,NULL,'$role')";
    mysqli_query($conn, $log_login_sql);
        $_SESSION['id'] = mysqli_insert_id($conn);
    
     

  
    $_SESSION['user'] = $email;


    if ($role == 'admin') { 
        if ($email == "admin@gmail.com" && $pass == "admin") {
            header("Location: dashboard.php");
        } else {    
            
            header("Location: login.html?error=invalid_admin_credentials");
            exit();
        }
    } else if ($role == 'user') {
         if ($data['role'] == 'user') 
        {
            header("Location: home.php");
            
        } else {
       
         header("Location: login.html?error=invalid_user_credentials");
        
            exit();
        }
    }
} else {
  

    header("Location: login.html"); 
  
    exit();
}
?>
