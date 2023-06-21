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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to check if the username exists
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username exists, now check the password
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        if (password_verify($password, $stored_password)) {
            echo "Login successful.";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }

    $stmt->close();
}
?>
