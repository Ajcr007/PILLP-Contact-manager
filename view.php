<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Contact Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        div {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px #888;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        #heading {
            color: black !important;
            background-color: white;
            text-align: center;
            font-weight: bold;
            padding: 12px;
        }
        button {
            width: 100px;
            padding: 10px;
            margin: 20px 5px;
            display: inline-block;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button.go-back-btn {
            width: 100px;
            padding: 10px;
            margin: 20px auto; /* Center the button */
            display: block; /* Make the button a block element */
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
</head>
<body>
<div>
    <?php
    // Create a database connection
    $con = mysqli_connect("localhost", "root", "", "contact");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if contact name is set in the URL
    if (isset($_GET['name'])) {
        // Prepare the SQL statement
        $contactname = $_GET['name'];
        $contactname = mysqli_real_escape_string($con, $contactname); // Sanitize the input
        $sql = "SELECT * FROM phone WHERE Name = '$contactname'"; // Enclose the variable in single quotes

        // Execute the statement
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of the contact with the given name
            $row = mysqli_fetch_assoc($result);
            echo "<table id='displaytable'>";
            echo "<tr><th colspan='2' id='heading' style='text-align:center;'><b>CONTACT DETAILS:</b></th></tr>";
            echo "<tr><th>Emp ID</th><td>" . $row["Emp_Id"] . "</td></tr>"; // Display Emp_Id
            echo "<tr><th>Name</th><td>" . $row["Name"] . "</td></tr>"; // Update column name to match the table structure
            echo "<tr><th>Title</th><td>" . $row["Title"] . "</td></tr>"; // Update column name to match the table structure
            echo "<tr><th>Phone</th><td>" . $row["Phone"] . "</td></tr>"; // Update column name to match the table structure
            echo "<tr><th>Email</th><td>" . $row["Email"] . "</td></tr>"; // Update column name to match the table structure
            // Add more fields as needed
            echo "</table>";
            // Add Edit and Delete buttons
            echo "<button onclick=\"window.location.href='edit.php?Emp_Id=" . $row['Emp_Id'] . "'\">Edit</button>";
            echo "<button onclick=\"window.location.href='delete.php?Emp_Id=" . $row['Emp_Id'] . "'\">Delete</button>";

        } else {
            echo "No results found for the specified contact name.";
        }
    } else {
        echo "No contact name specified.";
    }

    // Close the connection
    mysqli_close($con);
    ?>
</div>
<!-- The button to go back to the main page -->
<button class="go-back-btn" onclick="window.location.href='main.php'">Go Back to Main Page</button>
</body>
</html>
