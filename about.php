<?php include 'header.php'; ?>

<!-- About Us Section -->
<section class="about-container">
    <h2>About Us</h2>
    <p>Welcome to Book Haven, your local independent bookstore that specializes in bringing the joy of reading to people of all ages. Whether you are an avid reader or just beginning your reading journey, we have something for everyone!</p>

    <!-- Image of the Bookstore -->
    <div class="about-image">
        <img src="bookstore-image.jpg" alt="Our Bookstore">
    </div>

    <p>At Book Haven, we believe that books are windows to new worlds and portals to infinite possibilities. Our collection includes everything from bestsellers and classics to niche genres, making sure that everyone can find a book that sparks their imagination.</p>

    <div class="mission">
        <div>
            <h3>Our Mission</h3>
            <p>Our mission is simple: to inspire people of all ages to read more, learn more, and explore new ideas through books. We aim to foster a love of reading and provide a welcoming environment for all book lovers.</p>
        </div>
        <div>
            <h3>Our Vision</h3>
            <p>We envision a world where books are at the heart of every community, enriching lives and expanding horizons. Book Haven aspires to be the leading bookstore in our town, providing not just books, but also a space for events, discussions, and learning.</p>
        </div>
    </div>

    <div class="values">
        <div>
            <h3>Our Values</h3>
            <ul>
                <li><strong>Quality:</strong> We strive to provide only the best in terms of book selection, customer service, and overall experience.</li>
                <li><strong>Community:</strong> We believe in creating a vibrant, inclusive, and supportive environment for all book lovers.</li>
                <li><strong>Knowledge:</strong> Books are a source of knowledge, and we are dedicated to helping our customers find the right books for their needs.</li>
            </ul>
        </div>
        <div>
            <h3>Why Choose Us?</h3>
            <ul>
                <li><strong>Curated Selection:</strong> A carefully selected range of books to suit every taste.</li>
                <li><strong>Friendly Staff:</strong> Knowledgeable and passionate about books, always ready to recommend your next read.</li>
                <li><strong>Local Support:</strong> As a local business, we value our community and offer personalized service.</li>
            </ul>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .about-container {
            padding: 50px 20px;
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
        }

        .about-container h2 {
            text-align: center;
            color: #333;
            font-size: 2.2em;
            margin-bottom: 30px;
        }

        .about-container p {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #555;
        }

        .about-image {
            text-align: center;
            margin: 40px 0;
        }

        .about-image img {
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .mission, .values {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
        }

        .mission div, .values div {
            width: 48%;
        }

        .mission h3, .values h3 {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .footer {
          
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }

        .footer p {
            margin: 0;
            font-size: 1.1em;
        }
    </style>