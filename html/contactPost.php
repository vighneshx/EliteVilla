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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $question = $_POST['question'];

    // Prepare and execute the SQL query to insert the bid into the database
    $sql = "INSERT INTO contact (name, address, phone, email, question) VALUES ('$name', '$address', '$phone', '$email', '$question')";
    if ($conn->query($sql) === TRUE) {
        echo "Contact Form submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$URL = $_SERVER['HTTP_REFERER'];
    header("Location: $URL");
    exit;