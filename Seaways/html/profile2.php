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

// EmpID of the seafarer you want to retrieve
$empID = 20; // Replace with the actual EmpID of the seafarer

// Fetch specific personal details from the seafarer_personal_details table
$query = "SELECT EmpID, Full_Name, Date_of_Birth, Gender, Nationality, Contact_Address, Phone_Number, Email, Emergency_Contact_Phone, Passport_Number, Visa_Work_Permit_Type, Visa_Work_Permit_Number, CDC_Number, Crew_Position, Marital_Status, Uniform_Size FROM seafarer_personal_details WHERE EmpID = $empID";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $empID = $row['EmpID'];
    $name = $row['Full_Name'];
    $dateOfBirth = $row['Date_of_Birth'];
    $gender = $row['Gender'];
    $nationality = $row['Nationality'];
    $contactAddress = $row['Contact_Address'];
    $phoneNumber = $row['Phone_Number'];
    $email = $row['Email'];
    $emergencyContactPhone = $row['Emergency_Contact_Phone'];
    $passportNumber = $row['Passport_Number'];
    $visaWorkPermitType = $row['Visa_Work_Permit_Type'];
    $visaWorkPermitNumber = $row['Visa_Work_Permit_Number'];
    $cdcNumber = $row['CDC_Number'];
    $crewPosition = $row['Crew_Position'];
    $maritalStatus = $row['Marital_Status'];
    $uniformSize = $row['Uniform_Size'];
}
$qualificationQuery = "SELECT * FROM seafarer_qualifications WHERE EmpID = $empID";
$qualificationResult = mysqli_query($connection, $qualificationQuery);
if ($qualificationResult && mysqli_num_rows($qualificationResult) > 0) {
    $row = mysqli_fetch_assoc($qualificationResult);
    $empID = $row['EmpID'];
    $primary = $row['PrimaryEducation'];
    $secondary = $row['SecondaryEducation'];
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="http://localhost/Seaways/css/images/favicon.png">
    <link rel="stylesheet" href="http://localhost/Seaways/css/profile2.css">
    <title>Employee Profile</title>
</head>

<body>
    <div class="sidebar">
        <div class="profile">
            <img src="http://localhost/Seaways/images/profile-user.png" alt="Employee Photo">
            <button class="change-photo">Change Photo</button>
            <h4><strong><?php echo $name; ?></strong></h4>
        </div>
        <div class="back-button">
            <button><a href="http://localhost/Seaways/php/home.php">&larr; Go Back</a></button>
        </div>
        <ul class="nav">
            <li><a href="#personal">Personal Details</a></li>
            <li><a href="#qualification">Qualification</a></li>
            <li><a href="#contract">Contract Details</a></li>
            <li><a href="#bank">Bank Details</a></li>
            <li><a href="#edit">Edit Details</a></li>
            <li><a href="#sign-out">Sign Out</a></li>
        </ul>
    </div>
    <div class="main">
        <section id="personal" class="section">
            <h2>Personal Details</h2>
            <table>
                <tr>
                    <td>EmpID:</td>
                    <td><?php echo $empID; ?></td>
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><?php echo $dateOfBirth; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo $gender; ?></td>
                </tr>
                <tr>
                    <td>Nationality:</td>
                    <td><?php echo $nationality; ?></td>
                </tr>
                <tr>
                    <td>Contact Address:</td>
                    <td><?php echo $contactAddress; ?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo $phoneNumber; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Emergency Contact Phone:</td>
                    <td><?php echo $emergencyContactPhone; ?></td>
                </tr>
                <tr>
                    <td>Passport Number:</td>
                    <td><?php echo $passportNumber; ?></td>
                </tr>
                <tr>
                    <td>Visa/Work Permit Type:</td>
                    <td><?php echo $visaWorkPermitType; ?></td>
                </tr>
                <tr>
                    <td>Visa/Work Permit Number:</td>
                    <td><?php echo $visaWorkPermitNumber; ?></td>
                </tr>
                <tr>
                    <td>CDC Number:</td>
                    <td><?php echo $cdcNumber; ?></td>
                </tr>
                <tr>
                    <td>Marital Status:</td>
                    <td><?php echo $maritalStatus; ?></td>
                </tr>
                <tr>
                    <td>Uniform Size:</td>
                    <td><?php echo $uniformSize; ?></td>
                </tr>
            </table>
        </section>

        <section id="qualification" class="section">
            <h2>Qualification</h2>
            <table>
                <tr>
                    <td>Education:</td>
                    <td>Qualifications</td>
                </tr>
                <tr>
                    <td>Primary Education:</td>
                    <td><?php echo $primary ?></td>
                </tr>
                <tr>
                    <td>Secondary Education:</td>
                    <td><?php echo $secondary ?> </td>
                </tr>
            </table>
        </section>
        <section id="contract" class="section">
            <h2>Contract Details</h2>
            <table>
                <tr>
                    <td>Contract Type:</td>
                    <td>Contract Details</td>
                </tr>
                <tr>
                    <td>Crew Position:</td>
                    <td><?php echo $crewPosition; ?></td>
                </tr>
            </table>
        </section>
        <section id="bank" class="section">
            <h2>Bank Details</h2>
            <table>
                <tr>
                    <td>Account Number:</td>
                    <td>Account Number</td>
                </tr>
                <!-- Add more bank details here -->
            </table>
        </section>
        <section id="edit" class="section">
            <h2>Edit Details</h2>
            <!-- Add edit form or content here -->
        </section>
        <section id="sign-out" class="section">
            <h2><a href="http://localhost/Seaways/php/logout.php">&larrb; SignOut</a></h2>
            <!-- Add sign-out content here -->
        </section>
    </div>
</body>

</html>