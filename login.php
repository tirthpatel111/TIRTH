<?php
session_start();

// Prevent redirect loop if the user is already logged in
if (isset($_SESSION['user'])) {
    $role = $_SESSION['role']; // Get the role from session
    if ($role == 'admin') {
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: home.php");
        exit();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'test') or die('Connection failed');

    // Get form input values
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $role = $_POST["u_type"];

    // Query to check if the user exists in the database
    $que = "SELECT * FROM register WHERE Email = '$email' AND pass = '$pass'";
    $a = mysqli_query($conn, $que);

    // Check if the user is found
    if (mysqli_num_rows($a) == 1) {
        $data = mysqli_fetch_assoc($a);
        
        // Get user ID and set session variables
        $id = $data['id'];
        $_SESSION['id'] = $id;
        $_SESSION['idx'] = $id;
        $_SESSION['user'] = $email;
        $_SESSION['role'] = $data['role'];  // Save the role in session
        
        // Log the login attempt
        $log_login_sql = "INSERT INTO audit_table VALUES ('', '$id', CURRENT_TIMESTAMP, NULL, '$role')";
        mysqli_query($conn, $log_login_sql);

        // Redirect based on the role
        if ($role == 'admin') {
            if ($email == "admin@gmail.com" && $pass == "admin") {
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: login.php?error=invalid_admin_credentials");
                exit();
            }
        } else if ($role == 'user') {
            if ($data['role'] == 'user') {
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=invalid_user_credentials");
                exit();
            }
        }
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Display error messages -->
        <?php if (isset($_GET['error'])): ?>
            <p class="error">
                <?php 
                if ($_GET['error'] == 'invalid_credentials') {
                    echo "Invalid email or password!";
                } elseif ($_GET['error'] == 'invalid_admin_credentials') {
                    echo "Invalid admin credentials!";
                } elseif ($_GET['error'] == 'invalid_user_credentials') {
                    echo "Invalid user credentials!";
                }
                ?>
            </p>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="pass" required>

                <div class="input-group">
                    <label>Role</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="u_type" value="admin" required> Admin
                        </label>
                        <label>
                            <input type="radio" name="u_type" value="user" required> User
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit" name="login" class="login-button">Login</button>

            <p class="link">Don't have an account?<br>
                <a href="signup.html">Sign up here</a>
            </p>
        </form>
    </div>
</body>
</html>
