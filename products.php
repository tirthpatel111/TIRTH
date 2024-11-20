<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'test') or die('Connection failed');

include "header.php";
// Add to cart functionality
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Check if the cart session is already initialized, if not, initialize it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product already exists in the cart
    $found = false;
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['id'] == $product_id) {
            // Increment the quantity if the product is already in the cart
            $_SESSION['cart'][$key]['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // If not found, add the product to the cart
    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => 1
        ];
    }

    echo "Product added to cart!";
}

// Fetch products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Added error handling
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="product-container">
    <h2>Our Products</h2>
    <div class="products">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="product">
                <img src="<?php echo $row['Image']; ?>" alt="Product Image" width="200">
                <h3><?php echo $row['Name']; ?></h3>
                <p>Price: $<?php echo $row['Price']; ?></p>

                <!-- Add to Cart Button -->
                <form action="user_product.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['ID']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['Name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['Price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['Image']; ?>">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>

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
    font-size: 16px;
}

/* Product Container */
.product-container {
    width: 80%;
    margin: 0 auto;
}

.product-container h2 {
    text-align: center;
    margin: 20px 0;
}

/* Products Grid */
.products {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.product {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 15px;
    margin: 10px;
    border-radius: 8px;
    width: 250px; /* Fixed width */
    height: 400px; /* Fixed height */
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product img {
    width: 100%;
    height: 150px; /* Fixed image height */
    object-fit: cover; /* Maintain aspect ratio */
    border-radius: 8px;
}

.product h3 {
    margin-top: 10px;
    font-size: 18px;
}

.product p {
    font-size: 16px;
    color: #4CAF50;
}

.product button {
    padding: 10px 15px;
    font-size: 16px;
    color: #fff;
    background-color: #FF5733;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.product button:hover {
    background-color: #c44124;
}
</style>