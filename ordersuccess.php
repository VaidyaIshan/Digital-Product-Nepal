<?php
session_start(); // Start the session

// Check if order number is set in session
if (!isset($_SESSION['order_number'])) {
    // Redirect or handle error if order number is not found
    header("Location: home.php"); // Redirect to index or another page
    exit();
}

$orderNumber = $_SESSION['order_number']; // Retrieve the order number from session

// Optionally unset the session variable if it's not needed anymore
unset($_SESSION['order_number']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #2dbd7a;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .success-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-container h1 {
            color: #2dbd7a;
        }

        .success-container p {
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Order Placed Successfully!</h1>
        <p>Your order number is: <strong><?php echo $orderNumber; ?></strong></p>
        <p>Your order was placed successfully. Please wait while we contact you shortly.</p>
        <a href="home.php">Home Page</a>
    </div>
  
</body>
</html>
