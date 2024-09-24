<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if the user is not logged in
    exit();
}

$sessionUsername = $_SESSION['username']; // Renamed to avoid conflict

include("configuration.php");

// Fetch all users with email included
$stmt = $conn->prepare("SELECT username, firstname, lastname, email FROM users");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die("Get result failed: " . $stmt->error);
}
$users = $result->fetch_all(MYSQLI_ASSOC);

// Debug: Check the fetched users
if (empty($users)) {
    error_log("No users found.");
} else {
    error_log("Users fetched successfully.");
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Digital Product Nepal</title>
    <style>
        body {
            background-color: #2dbd7a;
            margin: 0;
            font-family: 'Bahnschrift', Arial, sans-serif;
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
            margin-top: 80px;
            padding: 20px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        .order-table th, .order-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .order-table th {
            background-color: #333;
            color: white;
        }

        .order-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .cancel-btn {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cancel-btn:hover {
            background-color: #d32f2f;
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
        .container {
            margin-top: 80px;
            padding: 20px;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .user-table th {
            background-color: #333;
            color: white;
        }

        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Responsive layout adjustments */
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
    <nav class="navbar" id="navbar">
            <a href="#" class="logo">Digital Product Nepal</a>
            <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
            <div>
                <a href="homeadmin.php">Home</a>
                <a href="users.php">Users</a>
             
                <div class="dropdown">
                    <a href="#" class="dropbtn">Orders</a>
                    <div class="dropdown-content">
                        <a href="alludemyorders.php">Udemy Orders</a>
                        <a href="allorders.php">Other Orders</a>
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
        <h1>All Users</h1>
        <?php if (count($users) > 0): ?>
            <table class="user-table">
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                        <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
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

</body>
</html>