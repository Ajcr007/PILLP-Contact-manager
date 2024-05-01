<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the data from the form
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Establish a connection to the database
    $con = mysqli_connect("localhost", "root", "", "contact");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and bind the SQL statement
    $stmt = $con->prepare("INSERT INTO phone (Emp_Id, Name, Title, Phone, Email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $emp_id, $name, $title, $phone, $email);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($con);
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
