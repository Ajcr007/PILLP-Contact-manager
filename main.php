<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 20%;
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            font-size: 25px;
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: block;
            margin: 10px 0;
        }
        .sidebar a:hover {
            background-color: #388E3C;
        }
        .content {
            width: 80%;
            padding: 20px;
        }
        .content h2 {
            margin-bottom: 20px;
        }
        .content .search-bar {
            margin-bottom: 20px;
        }
        .content .search-bar input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .content .search-bar input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .content th, .content td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        .content th {
            background-color: #4CAF50;
            color: #fff;
        }
        .content td a {
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
        }
        .add-button {
            margin-bottom: 20px;
        }
        .add-button button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .add-button button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Filter</h3>
        <!-- Dropdown for filter -->
        <form action="main.php" method="GET">
            <select name="filter">
                <option value="">All</option>
                <option value="Software Engineer">Software Engineer</option>
                <option value="Web Developer">Web Developer</option>
                <option value="Data Scientist">Data Scientist</option>
                <option value="UI/UX Designer">UI/UX Designer</option>
                <option value="DevOps Engineer">DevOps Engineer</option>
            </select>
            <input type="submit" value="Apply Filter">
        </form>
        <h3>Sort</h3>
        <!-- Dropdown for sort -->
        <form action="main.php" method="GET">
            <select name="sort">
                <option value="">Select Sort</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
                <option value="title_asc">Title (A-Z)</option>
                <option value="title_desc">Title (Z-A)</option>
            </select>
            <input type="submit" value="Apply Sort">
        </form>
    </div>

    <div class="content">
        <h2>Contacts</h2>
        <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="name" placeholder="Search...">
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="add-button">
            <button onclick="window.location.href='add.php'">Add New Contact</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish a connection to the database
                $con = mysqli_connect("localhost", "root", "", "contact");

                // Check if the connection was successful
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Initialize the filter variable
                $filter = '';

                // Initialize the SQL variable
                $sql = "SELECT * FROM phone";

                // Check if the filter parameter is set in the URL
                if (isset($_GET['filter'])) {
                    $filter = $_GET['filter'];
                    // You might want to validate the filter value to prevent SQL injection

                    // Append WHERE clause based on the selected filter
                    if (!empty($filter)) {
                        $sql .= " WHERE Title = '$filter'";
                    }
                }

                // Initialize the sort variable
                $sort = '';

                // Check if the sort parameter is set in the URL
                if (isset($_GET['sort'])) {
                    $sort = $_GET['sort'];

                    // Append ORDER BY clause based on the selected sort
                    switch ($sort) {
                        case 'name_asc':
                            $sql .= " ORDER BY Name ASC";
                            break;
                        case 'name_desc':
                            $sql .= " ORDER BY Name DESC";
                            break;
                        case 'title_asc':
                            $sql .= " ORDER BY Title ASC";
                            break;
                        case 'title_desc':
                            $sql .= " ORDER BY Title DESC";
                            break;
                        default:
                            // Invalid sort value, handle accordingly
                            break;
                    }
                }

                // Execute the SQL statement
                $result = mysqli_query($con, $sql);

                // Check if contacts exist
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each contact
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><a href='view.php?name=" . $row['Name'] . "'>" . $row['Name'] . "</a></td>";  
                        echo "<td>" . $row['Title'] . "</td>";  
                        echo "<td>" . $row['Phone'] . "</td>";  
                        echo "<td>" . $row['Email'] . "</td>";  
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No contacts found</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
