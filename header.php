<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.user_header {
    background-color:003049; 
    padding: 15px 20px;
}

.header_1 {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.user_flex {
    display: flex;
    align-items: center; 
}


.logo_cont {
    display: flex;
    align-items: center;
}

.logo_cont img {
    width: 50px; 
    margin-right: 10px; 
}

.book_logo {
    font-size: 24px;
    color:white; 
    text-decoration: none;
    font-weight: bold;
}

.navbar {
    margin-left: 300px;
    display: flex;
    gap: 20px; 
}

.navbar a {
    text-decoration: none;
    color: white; 
    padding: 10px 15px;
    transition: color 0.3s ease;
}

.navbar a:hover {
    color: #0056b3; 
    border-bottom: 2px solid #0056b3; 
}

.login a{
    color:white;
    justify-content: flex-end;
    gap: 20px;

    
}



button {
        background-color: #f44336; /* Red */
        color: white;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
    }

    button:hover {
        background-color: #d32f2f;
    }


/* Responsive Styles */
/* @media (max-width: 768px) {
    .header_1 {
        flex-direction: column; 
        align-items: flex-start;
    }

    .navbar {
        flex-direction: column;
        gap: 10px; 
        margin-top: 10px; 
    }
} */
</style>
<header class="user_header">
    <div class="header_1">
        <div class="user_flex">
            <div class="logo_cont">
                <img src="book_logo.png" alt="Bookiee Logo">
                <a href="home.php" class="book_logo">Bookiee</a>
            </div>
            <nav class="navbar">
                <a href="home.php">Home</a>
                <a href="about.php">About</a>
                <a href="shop.php">Product</a>
                <a href="contect.php">Contect</a>
                <a href="user_history.php">History</a>
            </nav>
            </div>
               
            <form action="logout.php" method="post">
            <button type="submit">Logout</button>
            </form>
            <!-- <nav class="login"> 
            <a href="login.php">Login</a>
            <a href="reg.php">Register</a>
            </nav> -->
            
            
       
    </div>
</header>
