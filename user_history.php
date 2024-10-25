<?php
$conn = mysqli_connect('localhost', 'root', '', 'test') or die('Connection failed');

session_start();

if ($_SESSION != null) {
    include "header.php";
    
    $id=$_SESSION['idx'];
    // echo $id;
    $query = "SELECT * FROM audit_table where id = $id";
    $result = mysqli_query($conn, $query);
    
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Audit Id</th><th>User Id</th><th>Login Date and Time </th><th>Logout Date and Time </th></tr>"; 
        
      
        while ($row = mysqli_fetch_assoc($result)) {
           
            echo "<tr>";
            echo "<td>" .($row['audit_id']) . "</td>";
            echo "<td>" .($row['id']) . "</td>";
            echo "<td>" .($row['login_time']) . "</td>";
            echo "<td>" .($row['logout_time']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No records found.";
    }
    
    include "footer.php";
} else {
    header("Location: login.php");
}

// tirth
?>