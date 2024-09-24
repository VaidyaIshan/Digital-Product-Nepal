
<?php 
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="apple-touch-icon" sizes="180x180" href="/src/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/src/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/src/favicon-16x16.png">
<link rel="manifest" href="/src/site.webmanifest">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/logreg.css'>
</head>
<body>      
       
    <div class="Main-box">
        <div class="side-content">

            <h1 class="main-title1">Digital Product Nepal</h1>
            <h1 class="main-title2">Nepal’s Gateway to Cutting-Edge Digital Solutions.</h1>
            <p></p>
        </div>
        <div class="box">
           
            <h2 class="login-now">Login</h2><br>
            <form method="POST" >
                <input class="form-inp" type="text" placeholder="Enter your username" name="username"><br><br>
                <input class="form-inp" type="password" placeholder="Enter your password" name="password"><br><br><br>
                <input type="submit" value="Login Now" id="Submit-btn" name="LOGIN2"><br><br>
                <p class="New-register">New Here? <a href="register.php">Register Now</a></p>
            </form>
        </div>
    </div>
        
</body>
</html>