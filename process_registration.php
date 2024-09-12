<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ceit_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set parameters
$name = $_POST['name'];
$schoolId = $_POST['schoolId'];
$bday = $_POST['bday'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$year = $_POST['year'];
$sports = $_POST['sports'];
$talent = $_POST['talent'];
$course = $_POST['course'];
$orgs = $_POST['Orgs'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registrations (name, schoolId, bday, email, phoneNumber, year, sports, talent, course, orgs, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $name, $schoolId, $bday, $email, $phoneNumber, $year, $sports, $talent, $course, $orgs, $gender);

// Execute and check for success
if($stmt->execute()){
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
