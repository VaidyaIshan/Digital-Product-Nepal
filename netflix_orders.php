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


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $screenOption = $_POST['screenOption'];
    $durationOption = $_POST['durationOption'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $message = $_POST['message'];
    $Service='Netflix';
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';  // Retrieve username from session or set default

    // Calculate price based on the options chosen
    if ($screenOption == '1') {
        if ($durationOption == '1') $price = 399;
        else if ($durationOption == '3') $price = 1149;
        else if ($durationOption == '6') $price = 2099;
    } else if ($screenOption == '2') {
        if ($durationOption == '1') $price = 799;
        else if ($durationOption == '3') $price = 2299;
        else if ($durationOption == '6') $price = 4199;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO netflix_orders (screenOption, durationOption, email, contactNumber, message, price, username, Service) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssssiss", $screenOption, $durationOption, $email, $contactNumber, $message, $price, $username, $Service);

    // Execute the statement
    if ($stmt->execute()) {
        // Get the last inserted order number (primary key)
        $stmt = $conn->prepare("SELECT LAST_INSERT_ID() AS ordernum");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
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
        echo "Error: " . $stmt->error; // Output error for debugging
        // header("Location: error.php"); // Uncomment to redirect to an error page if desired
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>