<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
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
        input[type="submit"], input[type="reset"], input[type="button"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover {
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
    </style>
    <script>
        function goToMainPage() {
            window.location.href = "main.php";
        }
    </script>
</head>
<body>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <h1>Contact Details</h1>
        <table>
            <tr>
                <td>Emp ID:</td>
                <td><input type="text" name="emp_id" required></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
        </table>
        <input type="submit" value="Add Contact">
        <input type="button" value="Cancel" onclick="goToMainPage()">
    </form>
</body>
</html>
