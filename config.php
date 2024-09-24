<?php
include("configuration.php");
session_start();
if (isset($_POST['LOGIN2'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) { // Verify the hashed password
      $_SESSION['username'] = $username;
      if ($username === 'DGPadmin') {
        header('Location: homeadmin.php');
      } else {
        header('Location: home.php');
      }
      exit();
    } else {
      $message = "INVALID USERNAME OR PASSWORD";
      echo "<script>alert('$message');</script>";
    }
  } else {
    $message = "INVALID USERNAME OR PASSWORD";
    echo "<script>alert('$message');</script>";
  }

  $stmt->close();
}

$conn->close();
?>
