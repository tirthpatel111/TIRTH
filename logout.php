<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";


$conn = mysqli_connect($servername, $username, $password, $database) or die("Error connecting to database");

if (isset($_SESSION['id'])) {
    $id = $_SESSION['idx'];

    // Update the logout_time for the user's most recent login record
    $logout_sql = "UPDATE audit_table SET logout_time = CURRENT_TIMESTAMP WHERE id = '$id' AND logout_time IS NULL";
    mysqli_query($conn, $logout_sql);

    // Destroy the session to log the user out
    session_unset();
    session_destroy();
}

// Redirect to the login page after logout
header("Location: login.php");
exit();


?>
<?php
    // session_start();
   
    // session_unset();
    // session_destroy();

    // header("Location: login.php");

    // exit;
?>
