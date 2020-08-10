<?php

$stored_hash = "e34a60e8c38f3cc26930e8b04c51ac1741225342dd168c41f33f310fb5b1d65e"; //the password is calculator123
$salt = 'XyZzy12*_';

$message = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    $check = hash('sha256', $_POST['password'].$salt);
    if ($check == $stored_hash) {   //Redirect to game.php
        header("Location: calculator.php?username=".urlencode($_POST['username']));
        return;
    }
    else {
        $message = "Incorrect password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculator - Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='styles.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="login-box">
        <img class="login-image" src="img/math.png" alt="math sybol">
        <h1>Login Here</h1>
        <span class="input-helper"> <?=htmlentities($message)?> </span>
        <form method="POST">

            <!-- Username -->
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter Username" required>

            <!-- Password-->
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <input type="submit" value="Log in">

            <a href="">Lost your password?</a>
        </form>
    </div>    
</body>
</html>