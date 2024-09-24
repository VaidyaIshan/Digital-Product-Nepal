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
                <li><a href="login.php">Login</a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="https://docs.google.com/document/d/12dR5wQCQkw54mGtWpNAP-j9daC6sj1tEBEuHwccsaXE/edit?usp=sharing">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-section contact">
            <h2>Contact Us</h2>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Kathmandu, Nepal</li>
                <li><i class="fas fa-phone"></i> +977-9808473981</li>
                <li><i class="fas fa-envelope"></i> digitalproductnp@gmail.com</li>
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

<style>
    footer {
        background-color: #404040;
        color: #fff;
        padding: 20px 0;
        position: relative;
        width: 100%;
        text-align: center;
        bottom: 0;
    }

    .footer-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-section {
        flex: 1 1 250px;
        margin: 10px;
    }

    .footer-logo img {
        max-width: 100px;
        height: auto;
    }

    .footer-section h2 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer-section ul, .footer-section p {
        list-style: none;
        margin: 0;
        padding: 0;
        font-size: 14px;
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
        color: #ccc;
    }

    .social-icons {
        display: flex;
        justify-content: flex-start;
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
        color: #ccc;
    }

    .footer-bottom {
        margin-top: 20px;
        font-size: 14px;
    }
    .footer-section.social {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.footer-section.social h2 {
    margin-bottom: 10px;
}

.social-icons {
    display: flex;
    justify-content: flex-start;
    padding-left: 0;
}

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-section {
            text-align: center;
            margin: 20px 0;
        }
    }
</style>