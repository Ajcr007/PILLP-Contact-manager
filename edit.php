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
    $Emp_Id = $_GET['Emp_Id'];
    $sql = "SELECT * FROM phone WHERE Emp_Id = $Emp_Id";

    // Execute the statement
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the existing record
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No record found with the specified Emp_Id.";
    }

    // Close the connection
    mysqli_close($con);
} else {
    echo "No Emp_Id specified.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px #888;
        }
        table {
            width: 100%;
        }
        table tr td:first-child {
            text-align: left;
            padding-left: 10px;
        }
        input[type="text"], input[type="email"], input[type="number"], textarea {
            width: 90%;
            padding: 10px;
            margin: 10px 0px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"], input[type="checkbox"] {
            margin: 10px 5px;
        }
        input[type="submit"], input[type="button"] {
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
        input[type="submit"]:hover, input[type="button"]:hover {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s ease-in-out;
            width: 100%;
            transform: scale(1.05);
        }
        #heading {
            text-align: center;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
    <script>
        function goToMainPage() {
            window.location.href = "main.php";
        }
    </script>
</head>
<body>
    <form action="update.php" method="post">
        <div id="heading">PERSONAL DETAILS:</div>
        <table>
            <tr>
                <td>Emp ID:</td>
                <td><input type="text" name="emp" value="<?php echo $row['Emp_Id']; ?>" required></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?php echo $row['Name']; ?>" required></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value="<?php echo $row['Title']; ?>" required></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" value="<?php echo $row['Phone']; ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo $row['Email']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="Emp_Id" value="<?php echo $row['Emp_Id']; ?>">
                    <input type="submit" value="Update">
                    <input type="button" value="Cancel" onclick="goToMainPage()">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
