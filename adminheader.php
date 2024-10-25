<style>
    .admin_header {
    background-color: #fff; /* Change as needed */
    padding: 1rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.header_navigation {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header_logo {
    font-size: 1.5rem;
    color: #C1121F;
    text-decoration: none;
}

.header_navbar {
    display: flex;
    gap: 1rem;
}

.header_navbar a {
    text-decoration: none;
    color: #333; /* Adjust color as needed */
    font-weight: 600;
}

.header_navbar a:hover {
    color: #C1121F; /* Change color on hover */
}

.header_icons {
    display: flex;
    gap: 1rem;
}

.header_acc_box {
    display: none; /* Initially hidden */
    flex-direction: column;
    align-items: flex-end;
    padding: 1rem;
    background-color: #f9f9f9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.header_acc_box p {
    margin: 0.5rem 0;
}

.header_acc_box .delete-btn {
    background-color: #C1121F;
    color: white;
    padding: 0.5rem 1rem;
    text-decoration: none;
    border-radius: 5px;
}

.header_acc_box .delete-btn:hover {
    background-color: #a50e1a; /* Darker shade on hover */
}

/* Show the account box when needed, add this class via JavaScript */
.show-account-box {
    display: flex;
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
    
    </style>





<header class="admin_header">
    <div class="header_navigation">
      <a href="admin_page.php" class="header_logo">Admin Dashboard</a>

      <nav class="header_navbar">
        <a href="dashboard.php">Home</a>
        <a href="admin_products.php">Products</a>
        <a href="admin_orders.php">Orders</a>
        <a href="admin_users.php">Users</a>
        <a href="admin_history.php">History</a>
      </nav>
      <div class="header_icons">
        <div id="menu_btn" class="fas fa-bars"></div>
        <div id="user_btn" class="fas fa-user"></div>
      </div>
      <form action="logout.php" method="post">
            <button type="submit">Logout</button>
            </form>
    </div>
  </header>
