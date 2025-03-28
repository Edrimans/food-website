<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="short icon" href="image/short_icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!--Navigation Bar-->
    <nav>
        <div class="logo">
            <a href="index.html"><img src="image/logo.png"></a>
        </div>
        <ul>
            <li><a href="index.html" ><b>Home</b></a></li>
            <li><a href="about.html"><b>About</b></a></li>
            <li><a href="menu.php" class="action"><b>Menu</b></a></li>
            <li><a href="blog.html"><b>Reviews</b></a></li>
        </ul>
        <div class="login">
            <a href="login.html">Login</a>
        </div>
    </nav>

    <!--Banner-->
    <div class="banner_bg">
        <h1>Our<span>Menu</span></h1>
    </div>

    <div class="special-offers">
        <h2>Special Offers</h2>
        <ul>
            <li>30% Off on all items!</li>
            <li>Triple Feast Combo: 40% Off when you order 3 or more items!</li>
            <li>Buy 2 Pizzas and Get a Free Drink!</li>
        </ul>
    </div>

    <!--Menu-->
    <div class="menu">
        <?php
        $sql = "SELECT * FROM menu";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '<div class="menu_card">';
            echo '<div class="menu_img">';
            echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '</div>';
            echo '<div class="menu_text">';
            echo '<h2>' . $row['name'] . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<div class="menu_icon">';
            echo '<i class="fa-solid fa-star"></i>'; // Add rating system dynamically if needed
            echo '</div>';
            echo '<p class="price">$' . $row['price'] . '</p>';
            echo '<a href="#" class="menu_btn" onclick="addToCart({name: \'' . $row['name'] . '\', price: ' . $row['price'] . '})">';
            echo '<i class="fa-solid fa-burger"></i>Order Now';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <!--Footer-->
    <footer>
        <div class="footer_main">
            <div class="footer_tag">
                <h2>Location</h2>
                <p>Sri Lanka</p>
                <p>USA</p>
                <p>India</p>
                <p>Japan</p>
                <p>Italy</p>
            </div>
            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Home</p>
                <p>About</p>
                <p>Menu</p>
                <p>Gallery</p>
                <p>Order</p>
            </div>
            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+64 981 028 7858</p>
                <p>+64 993 525 3551</p>
                <p>ochoco.calvin@gmail.com</p>
                <p>food@gmail.com</p>
            </div>
            <div class="footer_tag">
                <h2>Our Services</h2>
                <p>Fast Delivery</p>
                <p>Easy Payments</p>
                <p>24 x 7 Service</p>
            </div>
            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>
        </div>
        <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> Calvin Ochoco</span></p>
    </footer>

    <!-- Sidebar Cart -->
    <div id="sidebar-cart" class="sidebar-cart">
        <h2>Your Cart <span id="close-cart">&times;</span></h2>
        <div id="user-details">
            <input type="text" id="user-name" placeholder="Your Name" required>
            <input type="tel" id="user-number" placeholder="Phone Number" required>
            <textarea id="user-address" placeholder="Delivery Address" required></textarea>
        </div>
        <div id="cart-items"></div>
        <div id="cart-total">Total: $<span id="total-price">0.00</span></div>
        <textarea id="delivery-message" placeholder="Add a message for the delivery driver (optional)"></textarea>
        <button id="checkout-btn">Checkout</button>
    </div>
    <button id="cart-toggle">
        <i class="fa fa-shopping-cart"></i>
        <span id="cart-count">0</span>
    </button>
    <script src="script.js"></script>
</body>
</html>
