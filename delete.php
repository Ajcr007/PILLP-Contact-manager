<?php
// Check if Emp_Id is set in the URL
if (isset($_GET['Emp_Id'])) {
    // Establish a connection to the database
    $con = mysqli_connect("localhost", "root", "", "contact");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $id = $_GET['Emp_Id'];
    $sql = "DELETE FROM phone WHERE Emp_Id = $id";

    // Execute the statement
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
} else {
    echo "No Emp_Id specified.";
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
