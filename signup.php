<?php
#require("conn.php");
$conn = mysqli_connect('localhost','root','','test') or die('connection failed');
?>
<?php


if(isset($_POST["signup"]))
{
#$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mn = $_POST['mobile'];
$add = $_POST['add'];
$pass = $_POST['pass'];

$user='user';



$query = "INSERT INTO register VALUES ('','$name','$email','$mn','$add','$pass','$user')";
if(mysqli_query($conn,$query))
{
    header("location:login.html");
}
 else    echo"no";


}


?>