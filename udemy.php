<?php 
include('udemy_orders.php');
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
    <title>Udemy Course Input Form</title>
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
    margin-top: 45px; /* Added margin to prevent overlap with navbar */
    flex-wrap: wrap; /* Allow wrapping */
}

.image-container {
    flex: 1;
    max-width: 100%; /* Ensure image container doesn't exceed parent width */
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
    max-width: 100%; /* Ensure form container doesn't exceed parent width */
    margin-top: 20px; /* Add margin for smaller screens */
}

.form-container h2 {
    margin: 0;
    margin-bottom: 20px;
    color: #333;
}

.social-icon {
    color: white;
    margin-left: 10px;
    font-size: 20px;
    transition: color 0.3s;
}

.social-icon:hover {
    color: #555;
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

.price-displayd {
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
    }

    .form-container {
        margin-left: 0;
    }
}

@media (max-width: 768px) {
    .image-container img {
        height: auto;
    }

    .container {
        padding: 20px;
        margin-top: 70px; /* Increase margin to avoid overlap with navbar */
    }

    .form-container {
        margin-left: 0;
        margin-top: 20px;
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
        margin-top: 100px; /* Increase margin to avoid overlap with navbar */
    }

    .form-container {
        margin-left: 0;
        margin-top: 20px;
    }
}

    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="header">
        <nav class="navbar" id="navbar">
            <a href="#" class="logo">Digital Product Nepal</a>
            <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
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
                 <a href="https://www.facebook.com/profile.php?id=61556878435327&mibextid=ZbWKwL" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>

                 <!-- WhatsApp and Messenger Icons -->
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="image-container">
            <img src="Logos/Udemy.jpg" alt="Logo" width="800" height="600">
        </div>
        <div class="form-container">
            <h2>Order Udemy Courses</h2>
            <form method="POST">
                <input class="form-inp" type="url" placeholder="Enter Udemy course link" name="courseLink" required>
                <input class="form-inp" type="email" placeholder="Enter your email (The course is delivered in this email)" name="email" required>
                <input class="form-inp" type="text" placeholder="Enter your contact number" name="contactNumber" required>
                <textarea class="form-textarea" placeholder="Enter your message" name="message" rows="4"></textarea>
                <div class="price-display">Rs (1100-1600)</div>
                <div class="price-displayd">Price varies with the course contact us for details.</div>
                <input type="submit" value="Place an order" id="Submit-btn" name="submit">
            </form>
        </div>
    </div>
    <script>
        function toggleMenu() {
            var navbar = document.getElementById("navbar");
            if (navbar.className === "navbar") {
                navbar.className += " responsive";
            } else {
                navbar.className = "navbar";
            }
        }
    </script>
    <?php
    include('footer.php')
    ?>
</body>
</html>
