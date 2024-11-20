<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'test') or die('Connection failed');

// Process the registration form when submitted
if (isset($_POST["signup"])) {
    // Get form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['add'];
    $pass = $_POST['pass'];

    // Define the default user role
    $user = 'user';

    // Insert the user data into the database
    $query = "INSERT INTO register (name, email, mobile, addd, pass, role) VALUES ('$name', '$email', '$mobile', '$address', '$pass', '$user')";

    // Check if the query was successful
    if (mysqli_query($conn, $query)) {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        // Show error message if insertion failed
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .registration-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .register-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .register-button:hover {
            background-color: #45a049;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Register</h2>

        <!-- Registration Form -->
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="mobile">Mobile Number</label>
                <input type="text" id="mobile" name="mobile" required>

                <label for="address">Address</label>
                <input type="text" id="address" name="add" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="pass" required>

                <button type="submit" name="signup" class="register-button">Register</button>
            </div>
        </form>

        <!-- Link to Login Page -->
        <p class="link">Already have an account?<br>
            <a href="login.php">Login here</a>
        </p>
    </div>
</body>
</html>
