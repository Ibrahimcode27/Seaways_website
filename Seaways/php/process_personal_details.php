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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $empID = $_POST['empID'];
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $contactAddress = $_POST['contactAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $emergencyContactPhone = $_POST['emergencyContactPhone'];
    $passportNumber = $_POST['passportNumber'];
    $visaWorkPermitType = $_POST['visaWorkPermitType'];
    $visaWorkPermitNumber = $_POST['visaWorkPermitNumber'];
    $cdcNumber = $_POST['cdcNumber'];
    $crewPosition = $_POST['crewPosition'];
    $maritalStatus = $_POST['maritalStatus'];
    $uniformSize = $_POST['uniformSize'];

    // Insert the data into the database (without prepared statement)
    $insertSQL = "INSERT INTO seafarer_personal_details (EmpID, Full_Name, Date_of_Birth, Gender, Nationality, Contact_Address, Phone_Number, Email, Emergency_Contact_Phone, Passport_Number, Visa_Work_Permit_Type, Visa_Work_Permit_Number, CDC_Number, Crew_Position, Marital_Status, Uniform_Size) 
    VALUES ('$empID', '$name', '$dateOfBirth', '$gender', '$nationality', '$contactAddress', '$phoneNumber', '$email', '$emergencyContactPhone', '$passportNumber', '$visaWorkPermitType', '$visaWorkPermitNumber', '$cdcNumber', '$crewPosition', '$maritalStatus', '$uniformSize')";

    // Execute the SQL query
    $result = mysqli_query($connection, $insertSQL);

    if ($result) {
        // Data added successfully
        header("Location: http://localhost/Seaways/html/Admin_panel.html"); // Redirect to a confirmation page
        exit();
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
