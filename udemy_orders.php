<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: login.php"); // Redirect to login if the user is not logged in
     exit();
 }
 
 $sessionUsername = $_SESSION['username'];

include("configuration.php");


// Check if form is submitted and username is in session
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    // Get form data
    $courseLink = $_POST['courseLink'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $message = $_POST['message'];
    $username = $_SESSION['username'];  // Retrieve username from session
    $price = 1500; // Default price

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO udemy_orders (courseLink, email, contactNumber, message, price, username) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $courseLink, $email, $contactNumber, $message, $price, $username);

    // Execute the statement
    if ($stmt->execute()) {
        // Get the last inserted order number (primary key)
        $stmt = $conn->prepare("SELECT LAST_INSERT_ID() AS ordernum");
        $stmt->execute();
        $stmt->bind_result($orderNumber);
        $stmt->fetch();

        // Store the order number in session
        $_SESSION['order_number'] = $orderNumber;

        // Redirect to success page
        header("Location: ordersuccess.php");
        exit();
    } else {
        // Handle error (optional logging)
        error_log("Error inserting order: " . $stmt->error);
        header("Location: error.php"); // Redirect to an error page if desired
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
  echo".";
}

// Close the connection
$conn->close();
?>
