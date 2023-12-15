<?php
<<<<<<< HEAD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to the database
    $servername = "localhost"; // Change this to your server name if different
    $username = "root"; // Change this to your database username
    $password = null; // No password for root user

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select your database
    $dbname = "cosaportal"; // Change this to your database name
    $conn->select_db($dbname);
	
    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO programme (programmeName, programmeStartDate, programmeEndDate, programmeTime, capacity, programmeDesc, programmePoster) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssiss", $programmeName, $programmeStartDate, $programmeEndDate, $programmeTime, $capacity, $programmeDesc, $programmePoster);

    // Set parameters from the form data
    $programmeName = $_POST['programmeName'];
    $programmeStartDate = $_POST['programmeStartDate'];
    $programmeEndDate = $_POST['programmeEndDate'];
    $programmeTime = $_POST['programmeTime'];
    $capacity = $_POST['capacity'];
    $programmeDesc = $_POST['programmeDesc'];
    $programmePoster = $_FILES['programmePoster']['name']; // Handle file upload separately

    // Move uploaded file to desired location
    $targetDir = "uploads/"; // Change this to your desired directory
    $targetFile = $targetDir . basename($_FILES['programmePoster']['name']);

    if (move_uploaded_file($_FILES['programmePoster']['tmp_name'], $targetFile)) {
        // File uploaded successfully
        echo "The file ". basename($_FILES['programmePoster']['name']). " has been uploaded.";
    } else {
        // Failed to upload file
        echo "Sorry, there was an error uploading your file.";
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
=======

$con = mysqli_connect('localhost', 'root', '',’cosaportal’);

$programmeId = $_POST['programmeId'];
$programmeName = $_POST['programmeName'];
$programmeStartDate = $_POST['programmeStartDate'];
$programmeEndDate = $_POST['programmeEndDate'];
$programmeTime = $_POST['programmeTime'];
$capacity = $_POST['capacity'];
$programmeDesc = $_POST['programmeDesc'];
$programmePoster = $_POST['programmePoster'];


// database insert SQL code
$sql = "INSERT INTO `programme` (`programmeId`, `programmeName`, `programmeStartDate`, `programmeEndDate`, `programmeTime`, `capacity`, 
`programmeDesc`, `programmePoster`) VALUES ('0', '$programmeName', '$programmeStartDate', '$programmeEndDate', '$programmeTime', 
'capacity', 'programmeDesc', 'programmePoster')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>
>>>>>>> 9ad8d6d6a7780b22a167fac474c5597396a7a0e3
