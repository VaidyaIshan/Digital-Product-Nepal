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

if (isset($_POST['cancel_order'])) {
    $ordernum = $_POST['ordernum'];
    $deleteStmt = $conn->prepare("DELETE FROM netflix_orders WHERE ordernum = ?");
    if (!$deleteStmt) {
        die("Prepare failed: " . $conn->error);
    }
    $deleteStmt->bind_param("i", $ordernum);
    if (!$deleteStmt->execute()) {
        die("Execute failed: " . $deleteStmt->error);
    }
    $deleteStmt->close();
}

// Fetch all orders
$stmt = $conn->prepare("SELECT ordernum, service, screenOption, durationOption, email, contactNumber, message, price FROM netflix_orders");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die("Get result failed: " . $stmt->error);
}
$orders = $result->fetch_all(MYSQLI_ASSOC);

// Debug: Check the fetched orders
if (empty($orders)) {
    error_log("No orders found.");
} else {
    error_log("Orders fetched successfully.");
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Digital Product Nepal</title>
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
       <link rel="apple-touch-icon" sizes="180x180" href="/src/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/src/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/src/favicon-16x16.png">
<link rel="manifest" href="/src/site.webmanifest">
</head>
<body>
<div class="header">
        <nav class="navbar" id="navbar">
            <a href="#" class="logo">Digital Product Nepal</a>
            <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
            <div>
                <a href="homeadmin.php">Home</a>
                <a href="users.php">USERS</a>
             
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
        <h1>ALL Orders</h1>
        <?php if (count($orders) > 0): ?>
            <table class="order-table">
                <tr>
                    <th>Service</th>
                    <th>Screen Option</th>
                    <th>Duration (in months)</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Message</th>
                    <th>Price (Rs)</th>
                    <th>Cancel Order</th>
                </tr>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['service']); ?></td>
                        <td><?php echo htmlspecialchars($order['screenOption']); ?></td>
                        <td><?php echo htmlspecialchars($order['durationOption']); ?></td>
                        <td><?php echo htmlspecialchars($order['email']); ?></td>
                        <td><?php echo htmlspecialchars($order['contactNumber']); ?></td>
                        <td><?php echo htmlspecialchars($order['message']); ?></td>
                        <td><?php echo htmlspecialchars($order['price']); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="ordernum" value="<?php echo htmlspecialchars($order['ordernum']); ?>">
                                <input type="submit" name="cancel_order" value="DELETE" class="cancel-btn">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
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
