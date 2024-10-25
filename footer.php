<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.footer {
    background-color: #003049;
    color: white;
    display: flex;
     flex-direction: column; 
    justify-content: center;
    align-items: center;
    padding-bottom: 2rem;
    gap: 1rem;
    /* cursor: pointer; */
}

.footer_box_container {
    width: 90%;
    display: flex;
    padding: 2rem;
    justify-content: space-between;
}

.footer_box {
    display: flex;
    flex-direction: column;
    cursor: pointer;
    width: 25%;
}

.footer_box h3 {
    font-size: 1.5rem;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
}

.footer_box p {
    font-size: 1rem;
    letter-spacing: 1px;
    margin-top: 0.5rem;
}

.footer_box a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    letter-spacing: 0.6px;
    margin-top: 0.5rem;
}

/* .footer_box a:hover::after {
    content: "";
    display: block;
    width: 35px;
    border-bottom: 2px solid #669bbc;
} */

.footer_logo_cont {
    width: 100%;
    display: flex;
    gap: 0.5rem;
    align-items: center;
    margin-bottom: 0.5rem;
}

.footer_logo_cont a {
    font-size: 1.5rem;
    font-weight: 500;
    letter-spacing: 1px;
}

.footer_logo_cont img {
    width: 10%;
}

/* .disabled {
    pointer-events: none;
    opacity: .5;
    user-select: none;
} */

/* @media (max-width: 991px) {
    .footer_box_container {
        flex-direction: column;
        align-items: center;
    }

    .footer_box {
        width: 80%;
        margin-bottom: 2rem;
    }
}

@media (max-width: 600px) {
    .footer_box {
        width: 100%;
    }
} */

</style>

<section class="footer">
  <div class="footer_box_container">
    <div class="footer_box">
      <div class="footer_logo_cont">
        <img src="book_logo.png" alt="">
      <a href="home.php" class="book_logo">Bookiee</a>

      </div>
      <p><i class="fas fa-phone"></i> 1234567890</p>
      <p><i class="fas fa-envelope"></i> bookiee@gmail.com</p>
      <p><i class="fas fa-map-marker-alt"></i> Anand, India - 388110</p>
      <!-- <p><i class="fa-solid fa-shop"></i> Shop Timings : 9am - 9pm</p> -->
    </div>

    <div class="footer_box">
      <h3>Quick Links</h3>
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="shop.php">Product</a>
      <a href="contact.php">Contact</a>
    </div>

    <div class="footer_box">
      <h3>Other Links</h3>
      <a href="logout.php">logout</a>
      <!-- <a href="login.php">Login</a>
      <a href="register.php">Register</a>
      <a href="cart.php">Cart</a>
      <a href="orders.php">Orders</a> -->
    </div>
  </div>
  <p>Copyright <i class="fa-regular fa-copyright"></i> 2024 <span>TIRTH PATEL | All Rights Reserved.</span></p>
</section>