<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 50px auto;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 0px 10px #888;
        padding: 20px;
    }

    .header {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .response-bar {
        background-color: #ff5555;
        color: #fff;
        padding: 10px;
        text-align: center;
        display: none; /* Hidden by default */
        margin-bottom: 10px;
    }

    .form-container {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .button-container {
        text-align: center;
    }

    .button-container input {
        width: 45%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .button-container input:hover {
        background-color: #45a049;
    }

    .button-container input[type="reset"] {
        background-color: #f44336;
    }

    .button-container input[type="reset"]:hover {
        background-color: #da190b;
    }

    .copyright {
        text-align: center;
        font-size: 12px;
    }
</style>
</head>
<body>

<div class="container">
    <div class="header">Contact Management System</div>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo '<div class="response-bar">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>
    <form action="display.php" method="post">
        <div class="form-container">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        
        <div class="button-container">
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>
    </form>
    <div class="copyright">Copyright © 2024 all rights reserved</div>
</div>

</body>
</html>
