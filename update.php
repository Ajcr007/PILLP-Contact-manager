<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to the database
    $con = mysqli_connect("localhost", "root", "", "contact");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Extract the data from the form
    $emp = $_POST['emp'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Prepare the SQL statement to update the record
    $sql = "UPDATE phone SET Emp_Id='$emp', Title='$title', Phone='$phone', Email='$email' WHERE Name='$name'";

    // Execute the statement
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
} else {
    echo "Invalid request method";
}
?>

<!-- CSS for the button -->
<style>
    button {
        width: 200px;
        padding: 10px;
        margin: 20px auto;
        display: block;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background: linear-gradient(to right, #4facfe, #00f2fe);
    }
</style>

<!-- The button to go back to the main page -->
<button onclick="window.location.href='main.php'">Go Back to Main Page</button>
