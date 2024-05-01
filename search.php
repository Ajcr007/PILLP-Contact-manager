<?php
// Check if name is set in the URL
if (isset($_GET['name'])) {
    // Establish a connection to the database
    $con = mysqli_connect("localhost", "root", "", "contact");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $name = $_GET['name'];
    $sql = "SELECT * FROM phone WHERE Name LIKE '%$name%'"; // Use LIKE for partial matches

    // Execute the statement
    $result = mysqli_query($con, $sql);

    // Check if a contact is found
    if (mysqli_num_rows($result) > 0) {
        // Fetch the contact details
        $row = mysqli_fetch_assoc($result);

        // Redirect to view.php with the name parameter
        header("Location: view.php?name=$name");
        exit();
    } else {
        // No contact found with the specified name
        echo "No contact found with the specified name.";
    }

    // Close the connection
    mysqli_close($con);
} else {
    // No name specified
    echo "No name specified.";
}
?>
