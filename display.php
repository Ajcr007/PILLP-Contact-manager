<?php
// Create a database connection
$con = mysqli_connect("localhost", "root", "", "contact");

// Check if the connection was successful
// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape user input to prevent SQL injection (you should consider using prepared statements)
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    // Query to check if the user exists
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    // Execute the query
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Check if the query returned any rows
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $username; // Set a session variable for the logged-in user
        header("Location: main.php"); // Redirect to the main page upon successful login
    } else {
        session_start();
        $_SESSION['error'] = "Invalid credentials. Please try again.";
        header("Location: index.php"); // Redirect back to the login page
    }
}

// Close the database connection
mysqli_close($con);
?>