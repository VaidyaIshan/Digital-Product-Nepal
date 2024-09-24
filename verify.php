<?php
session_start();

// Check if the session variable 'username' is set
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Session expired. Please register again.');</script>";
    header('Location: register.php');
    exit();
}


include("configuration.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['VERIFY_OTP'])) {
    $username = $_SESSION['username'];
    $otp = $_POST['otp'];

    $sql = "SELECT * FROM users WHERE username=? AND otp=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $updateSql = "UPDATE users SET status='active', otp=NULL WHERE username=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("s", $username);
        $updateStmt->execute();
        $updateStmt->close();
        
        // Clear the session for security reasons
        session_unset();
        session_destroy();

        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Invalid OTP.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
<html>
<head>
    <link rel="stylesheet" href="css/logreg.css">
       <link rel="apple-touch-icon" sizes="180x180" href="/src/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/src/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/src/favicon-16x16.png">
<link rel="manifest" href="/src/site.webmanifest">
</head>
<body>
    <div class="Main-box">
        <div class="side-content">
            <h1 class="main-title1">Digital Product Nepal</h1>
            <h1 class="main-title2">Nepal’s Gateway to Cutting-Edge Digital Solutions.</h1>
        </div>
        <div class="box">
            <h2 class="login-now">Verify Email Address</h2><br>
            <form name='verify' method="POST">
                <input class="form-inp" type="text" placeholder="Enter the one time password" name="otp"><br><br>
                <input type="submit" value="Verify OTP" id="Submit-btn" name="VERIFY_OTP"><br><br>
            </form>
        </div>
    </div>
</body>
<?php
    include('footer.php');
   ?>
</html>
