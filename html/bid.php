<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:3306";
$username = "ardjun";
$password = "Dokter2012";
$dbname = "EliteVilla";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $bid = $_POST['bid'];
	$villaNumber = $_POST['villaNumber'];

    // Prepare and execute the SQL query to insert the bid into the database
    $sql = "INSERT INTO bids (firstName, lastName, phoneNumber, email, bid, villaNumber) VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$bid', '$villaNumber')";
    if ($conn->query($sql) === TRUE) {
        echo "Bid submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$URL = $_SERVER['HTTP_REFERER'];
    header("Location: $URL");
    exit;