<?php
session_start();


$conn = mysqli_connect('localhost', 'root', '', 'test') or die('Connection failed');
include "adminheader.php";

// Add product
if (isset($_POST['add_product'])) {
    // Check if 'name' and 'price' are set
    if (isset($_POST['name']) && isset($_POST['price'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        
        // Check if the image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];

            // Upload image
            $upload_dir = "images/";
            $target_file = $upload_dir . basename($image);
            move_uploaded_file($image_temp, $target_file);

            // Insert product into the database (excluding 'id' column as it is auto-incremented)
            $query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$target_file')";
            if (mysqli_query($conn, $query)) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Please fill out all fields.";
    }
}


// Delete product
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM products WHERE id = $delete_id";
    if (mysqli_query($conn, $query)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Update product
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    if ($image) {
        // Upload image if new image is provided
        $upload_dir = "images/";
        $target_file = $upload_dir . basename($image);
        move_uploaded_file($image_temp, $target_file);
        $image_query = ", image = '$target_file'";
    } else {
        $image_query = "";
    }

    // Update product details
    $query = "UPDATE products SET name = '$name', price = '$price' $image_query WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Get list of products
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Error handling
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Admin Product Management Form -->
<div class="admin-panel">
    <h2>Admin Product Management</h2>

    <!-- Add Product Form -->
    <form action="admin_products.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name" required><br>
    <input type="number" name="price" placeholder="Product Price" required><br>
    <input type="file" name="image" accept="images/*" required><br>
    <button type="submit" name="add_product">Add Product</button>
</form>


<h3>Existing Products</h3>
<table class="product-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                <td><?php echo htmlspecialchars($row['Price']); ?></td>
                <td><img src="<?php echo htmlspecialchars($row['Image']); ?>" width="100" alt="Product Image"></td>
                <td>
                    <a href="admin_products.php?delete_id=<?php echo $row['ID']; ?>">Delete</a> |
                    <a href="update_product.php?id=<?php echo $row['ID']; ?>">Update</a>
                </td>
            </tr>
            <?php endwhile; 
        } else {
            echo "<tr><td colspan='4'>No products found</td></tr>";
        }
        ?>
    </tbody>
</table>

</div>

</body>
</html>

<?php mysqli_close($conn); ?>

<style>
/* General Styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

h2, h3 {
    color: #333;
}

/* Admin Panel */
.admin-panel {
    padding: 20px;
    background-color: #fff;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.admin-panel h2 {
    text-align: center;
    margin-bottom: 30px;
}

.admin-panel form input, .admin-panel form button {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.admin-panel form button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}

.admin-panel form button:hover {
    background-color: #45a049;
}

/* Product Table */
.product-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

.product-table th, .product-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.product-table th {
    background-color: #4CAF50;
    color: white;
}

.product-table td {
    background-color: #f9f9f9;
}

.product-table a {
    color: #4CAF50;
    text-decoration: none;
}

.product-table a:hover {
    text-decoration: underline;
}
</style>
