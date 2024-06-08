<?php
// Example database connection code
$hostname = "localhost"; // Change this to your actual hostname
$username = "roots"; // Change this to your actual username
$password = "1234"; // Change this to your actual password
$database = "seaways"; // Change this to your actual database name

// Create a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch data from the seafarers_login table
$query = "SELECT * FROM seafarers_login";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seafarers Information</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/Seaways/css/View.css">
    <link rel="icon" type="image/x-icon" href="http://localhost/Seaways/images/favicon.png">
</head>
<body>
    <div class="back-button">
        <a href="http://localhost/Seaways/Admin_panel/registration.html">&larr; Go Back</a>
    </div>
    <h1>Seafarers Login Information</h1>
    <table class="seafarers-table">
        <thead>
            <tr>
                <th>EmpID</th>
                <th>Username</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['EmpID']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['Admin']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
