<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="apple-touch-icon" sizes="180x180" href="/src/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/src/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/src/favicon-16x16.png">
<link rel="manifest" href="/src/site.webmanifest">
    <style>
        body {
            background-color: #2dbd7a;
            font-family: 'Bahnschrift', Arial, sans-serif;
            margin: 0;
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
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 80px 20px 20px; /* Adjusted padding to make space for navbar */
            font-family: inherit;
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

        .service {
            background-color: white;
            border-radius: 10px;
            width: 300px; /* Increased width to fit larger images */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: black;
            overflow: hidden;
            font-family: inherit;
        }

        .service:hover {
            transform: translateY(-10px);
        }

        .service img {
            width: 100%; /* Full width of the container */
            height: 200px; /* Fixed height for images */
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .service h3 {
            margin: 10px 0;
            font-family: inherit;
        }

footer {
    background-color: black; /* Match the existing background color */
    color: #fff;
    padding: 40px 0;
    text-align: center;
}

.footer-container {
    display: flex;
    justify-content: space-between; /* Align the sections properly */
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px; /* Adjust padding to prevent overflow */
}

.footer-section {
    flex: 1 1 250px;
    margin: 20px 10px; /* Add some margin between the sections */
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.about-section {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.footer-logo {
    margin-right: 20px;
}

.footer-logo img {
    max-width: 80px; /* Adjust the size of your logo */
    height: auto;
    margin-bottom: 0;
}

.about-text {
    flex: 1;
}

.about-text h2 {
    font-size: 18px;
    color: #fff;
    margin-bottom: 10px;
}

.about-text p {
    font-size: 14px;
    color: #fff;
}

.footer-section h2 {
    font-size: 18px;
    color: #fff;
    margin-bottom: 15px;
}

.footer-section p, .footer-section ul, .footer-section li {
    font-size: 14px;
    color: #fff;
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul {
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-section ul li a:hover {
    color: #333;
}

.social-icons {
    display: flex;
    padding: 0;
}

.social-icons li {
    margin-right: 15px;
}

.social-icons li a {
    color: #fff;
    font-size: 20px;
    transition: color 0.3s;
}

.social-icons li a:hover {
    color: #333;
}

.footer-bottom {
    margin-top: 20px;
    font-size: 14px;
    text-align: center;
}

.footer-bottom p {
    margin: 0;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-section {
        align-items: center;
        text-align: center;
    }

    .about-section {
        flex-direction: column;
        align-items: center;
    }

    .footer-logo {
        margin-right: 0;
        margin-bottom: 10px;
    }
}
               /* Adjust font sizes for main titles on smaller screens */
@media (max-width: 768px) {
    .main-title {
        font-size: 60px; /* Decreased font size for better fit */
    }

    .main-title2 {
        font-size: 30px; /* Decreased font size for better fit */
    }

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
                <a href="https://wa.me/9808473981" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                 <a href="https://www.facebook.com/profile.php?id=61556878435327&mibextid=ZbWKwL" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>

                 <!-- WhatsApp and Messenger Icons -->
            </div>
        </nav>
    </div>
    <div class="container">
        <a href="udemy.php" class="service">
            <img src="Logos/Udemy.jpg" alt="Udemy">
            <h3>Udemy</h3>
        </a>
        <a href="netflix.php" class="service">
            <img src="Logos/Netflix.jpg" alt="Netflix">
            <h3>Netflix</h3>
        </a>
       
        <a href="disney.php" class="service">
            <img src="Logos/Disney.webp" alt="Disney Hotstar">
            <h3>Disney Hotstar</h3>
        </a>
        <a href="prime.php" class="service">
            <img src="Logos/prime.png" alt="Prime Video">
            <h3>Prime Video</h3>
        </a>
        
        <a href="spotify.php" class="service">
            <img src="Logos/spotify.jpg" alt="Spotify">
            <h3>Spotify</h3>
        </a>
        <a href="truecaller.php" class="service">
            <img src="Logos/truecaller.png" alt="Truecaller">
            <h3>Truecaller</h3>
        </a>
        <a href="zee.php" class="service">
            <img src="Logos/zee.jpeg" alt="Zee5">
            <h3>Zee5</h3>
        </a>
        <a href="yt.php" class="service">
            <img src="Logos/Yt.webp" alt="YouTube Premium">
            <h3>YouTube Premium</h3>
        </a>
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
    <footer>
    <div class="footer-container">
        <div class="footer-section about">
            <div class="footer-logo">
                <img src="logo.jpg" alt="Digital Product Nepal Logo">
            </div>
            
        </div>
        <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="https://docs.google.com/document/d/12dR5wQCQkw54mGtWpNAP-j9daC6sj1tEBEuHwccsaXE/edit?usp=sharing">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-section contact">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact Us</h2>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Kathmandu, Nepal</li>
                <li><i class="fas fa-phone"></i> +977-9808473981</li>
                <li><i class="fas fa-envelope"></i> digitalproductnp@gmail.com.com</li>
            </ul>
        </div>
        <div class="footer-section social">
            <h2>Follow Us</h2>
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/profile.php?id=61556878435327&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://wa.me/9779808473981" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="https://www.instagram.com/digitalproductnepal1" target="_blank"><i class="fab fa-instagram"></i></a></li>
                
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Digital Product Nepal. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>
