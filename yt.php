<?php 
include('yt_orders.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="apple-touch-icon" sizes="180x180" href="/src/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/src/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/src/favicon-16x16.png">
<link rel="manifest" href="/src/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Video Subscription - Digital Product Nepal</title>
    <style>
        body {
            background-color: #2dbd7a;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .header {
            width: 100%;
            background-color: #333;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .navbar .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #555;
        }

        .container {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 90%;
            margin-top: 60px; /* Adjusted for the fixed header */
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .form-container {
            flex: 1;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container h2 {
            margin: 0;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            width: 100%;
            margin-bottom: 15px;
        }

        .form-container .form-inp, .form-container .form-textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container .form-textarea {
            resize: vertical;
        }

        .form-container .price-display {
            width: 100%;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .form-container .price-displayd {
            width: 100%;
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .form-container #Submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #2dbd7a;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        /* Responsive CSS */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .navbar a {
        display: none;
    }

    .navbar .logo {
        display: block;
        padding: 10px 20px;
    }

    .navbar .menu-icon {
        display: block;
        color: white;
        font-size: 28px;
        cursor: pointer;
        padding: 10px 20px;
    }

    .navbar.responsive a {
        display: block;
        width: 100%;
        text-align: left;
    }

    .navbar.responsive .dropdown-content {
        position: static;
        box-shadow: none;
    }

    .container {
        flex-direction: column;
        margin-top: 80px; /* Increase margin to avoid overlap with navbar */
        padding: 20px;
    }

    .form-container {
        margin-left: 0;
        margin-top: 20px;
    }
}

@media (max-width: 768px) {
    .image-container img {
        height: auto;
    }

    .container {
        padding: 20px;
        margin-top: 100px; /* Increase margin to avoid overlap with navbar */
    }

    .form-container {
        margin-left: 0;
        margin-top: 20px;
    }

    .price-display,
    .price-displayd {
        font-size: 18px;
    }

    .form-container .form-inp,
    .form-container .form-textarea {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .main-title {
        font-size: 25px; /* Further decreased font size for smaller screens */
    }

    .main-title2 {
        font-size: 10px; /* Further decreased font size for smaller screens */
    }

    .container {
        flex-direction: column;
        padding: 10px;
        margin-top: 120px; /* Increase margin to avoid overlap with navbar */
    }

    .form-container {
        margin-left: 0;
        margin-top: 20px;
    }

    .price-display,
    .price-displayd {
        font-size: 16px;
    }

    .form-container .form-inp,
    .form-container .form-textarea {
        font-size: 12px;
    }

    .navbar .menu-icon {
        padding: 10px;
    }

    .navbar .logo {
        font-size: 20px;
    }
}
.dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="header">
        <nav class="navbar" id="navbar">
            <a href="#" class="logo">Digital Product Nepal</a>
            <span class="menu-icon" onclick="toggleMenu()"><i class="fas fa-bars"></i></span>
            <div>
                <a href="home.php">Home</a>
                <a href="services.php">Services</a>
                <a href="contact.php">Contact</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn">Orders</a>
                    <div class="dropdown-content">
                        <a href="userudemyorders.php">Udemy Orders</a>
                        <a href="orders.php">Other Orders</a>
                    </div>
                </div>
                <!-- WhatsApp and Messenger Icons -->
                <a href="https://www.instagram.com/digitalproductnepal1" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/9779808473981" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                 <!-- WhatsApp and Messenger Icons -->
                  <a href="https://www.facebook.com/profile.php?id=61556878435327&mibextid=ZbWKwL" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>

            </div>
        </nav>
    </div>
    <div class="container">
        <div class="image-container">
            <img src="Logos/Yt.webp" alt="Youtube Premium Video Subscription" width="800" height="600">
        </div>
        <div class="form-container">
            <h2>Order Youtube Premium Subscription</h2>
            <form method="POST">
            <div class="form-group">
                    <label for="screenOption">Choose Screen/Device:</label>
                    <select id="screenOption" name="screenOption" onchange="updatePrice()" class="form-inp">
                        <option value="1">1 Screen/Device</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="durationOption">Choose Subscription Duration:</label>
                    <select id="durationOption" name="durationOption" onchange="updatePrice()" class="form-inp">
                        <option value="12">1 Year</option>
                    </select>
                </div>
                <input class="form-inp" type="email" placeholder="Enter your email (The Premium will be activated on this email)" name="email" required>
                <input class="form-inp" type="text" placeholder="Enter your contact number" name="contactNumber" required>
                <textarea class="form-textarea" placeholder="Enter your message" name="message" rows="4"></textarea>
                <div class="price-display" id="priceDisplay">Rs 1999</div>
                <div class="price-displayd">Price varies based on the options chosen.</div>
                <input type="submit" value="Place an order" id="Submit-btn" name="submit">
            </form>
        </div>
    </div>
    <script>
        function updatePrice() {
            var durationOption = document.getElementById('durationOption').value;
            var price = 0;

            if (durationOption === '1') {
                price = 299;
            } else if (durationOption === '12') {
                price = 1999;
            }

            document.getElementById('priceDisplay').innerText = 'Rs ' + price;
        }
        function toggleMenu() {
            var navbar = document.getElementById("navbar");
            if (navbar.className === "navbar") {
                navbar.className += " responsive";
            } else {
                navbar.className = "navbar";
            }
        }
    </script>
</body>
<?php
    include('footer.php');
   ?>
</html>
