<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "cosaportal";   
$conn = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $faculty = $_POST['faculty'];
    $dateFromForm = $_POST['date'];
    $date = date('Y-m-d', strtotime($dateFromForm));
    $time = $_POST['time'];
    $description = $_POST['description'];

    try {
        $query = "INSERT INTO engagement (engagementName, engagementEmail, engagementMobile, engagementFaculty, 
        engagementDate, engagementTime, engagementDescription) VALUES
        (:name, :email, :mobile_number, :faculty, :date, :time, :description);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mobile_number", $mobile_number);
        $stmt->bindParam(":faculty", $faculty);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":time", $time);
        $stmt->bindParam(":description", $description);

        $stmt->execute();

        $pdo = null; $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 
    
    header("Location: mailto:Cosabatch01@gmail.com");   
}

?>