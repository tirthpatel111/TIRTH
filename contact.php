<?php include 'header.php'; ?>

<!-- Contact Us Section -->
<section class="contact-container">
    <h2>Contact Us</h2>
    <p>If you have any questions or need assistance, feel free to reach out to us using the information below.</p>

    <!-- Contact Information Section -->
    <div class="contact-info">
        <h3>Our Bookstore Information</h3>
        <p><strong>Address:</strong> 123 Book Street, Anand, Gujarat, India</p>
        <p><strong>Phone:</strong> +1 (555) 123-4567</p>
        <p><strong>Email:</strong> <a href="mailto:support@bookhaven.com">support@bookhaven.com</a></p>
        <p><strong>Working Hours:</strong></p>
        <ul>
            <li>Monday - Friday: 9:00 AM - 6:00 PM</li>
            <li>Saturday: 10:00 AM - 4:00 PM</li>
            <li>Sunday: Closed</li>
        </ul>
    </div>

    <!-- Map Section showing Anand, Gujarat -->
    <div class="contact-map">
        <h3>Find Us on the Map</h3>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3700.013210040719!2d72.92965341472533!3d22.560482544027407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c4971da65a97f%3A0x8862bbbd9e39bb3b!2sAnand%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1628091224406!5m2!1sen!2sin" 
            width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</section>

<?php include 'footer.php'; ?>


<style>
    .contact-container {
    width: 80%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.contact-container h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.contact-info {
    margin-top: 20px;
}

.contact-info h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
}

.contact-info p {
    font-size: 16px;
    color: #555;
}

.contact-info ul {
    list-style: none;
    padding-left: 0;
}

.contact-info ul li {
    font-size: 16px;
    color: #555;
    margin-bottom: 5px;
}

.contact-map {
    margin-top: 40px;
}

.contact-map iframe {
    width: 100%;
    border-radius: 4px;
}
</style>