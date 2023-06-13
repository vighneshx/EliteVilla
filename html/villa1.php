<?php
$servername = "localhost";
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

  // Prepare and execute the SQL query to insert the bid into the database
  $sql = "INSERT INTO bids (firstName, lastName, phoneNumber, email, bid) VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$bid')";
  if ($conn->query($sql) === TRUE) {
      echo "Bid submitted successfully.";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/villa1.css">
  <title>Elite Villa</title>
</head>
<style>
</style>

<body>
  <header>
    <nav>
      <div class="logo-container">
        <img src="../assets/logo.png" alt="Company Logo" class="logo">
      </div>
      <ul class="nav-links">
        <li><a href="./main.html">Home</a></li>
        <li><a href="./contact.html">Contact</a></li>
      </ul>
      <div class="container">
        <a href="#" class="btn">Login</a>
        <a href="#" class="btn reg">Register</a>
      </div>

    </nav>
  </header>


  <main class="main-content">

    <div class="left-column">
      <section id="villa-description">
        <h1>Holiday Home Villa Poss</h1>
        <p>Holiday Home Villa Poss offers free WiFi and is located in Villa, 42 km from the Serravalle Golf Club and 1.8
          km from Villa. This holiday home features a private pool, a garden, and free private parking.</p>
        <p>The holiday home has 6 bedrooms, a TV, an equipped kitchen with a dishwasher and a microwave, a washing
          machine, and 5 bathrooms with a shower.</p>
        <p>The nearest airport is Genoa Cristoforo Colombo, 75 km from the holiday home.</p>
        <p>Holiday Home Villa Poss has been welcoming guests from Booking.com since March 31, 2016.</p>
        <p>Distance in accommodation description calculated with © OpenStreetMap.</p>
        <button type="submit">Learn More</button>
      </section>

      <section id="villa-location">
        <h2>Location</h2>
        <div id="map">
          <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Holiday%20Home%20Villa%20Maria,%20Corso%20Italia,%20Giarre,%20Metropolitan%20city%20of%20Catania,%20Italy+(Holiday%20Home%20Villa%20Poss)&amp;t=k&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe></div>
      </section>
    </div>



    <div class="right-column">
      <h2>Hoogste biedingen</h2>
      <section id="bidding-section">
        <div id="bids">
          <!-- Top 3 bids here -->
        </div>

        <div id="place-bid">
          <h2>Doe een bod</h2>
          <form id="bidForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="saveBid(event)">

            <input type="text" id="firstName" placeholder="Voornaam" required>
            <input type="text" id="lastName" placeholder="Achternaam" required>
            <input type="tel" id="phoneNumber" placeholder="Telefoonnummer" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="number" id="bid" placeholder="Bod" min="0" required>
            <input type="submit" value="Doe een bod">
          </form>
        </div>
    </div>
    </section>
  </main>


  <footer>
    <div class="footer-animation" id="footer-animation"></div>

    <div class="footer-sections">
      <div class="footer-section">
        <h2>Mobile App</h2>
      </div>
      <div class="footer-section">
        <h2>Community</h2>
      </div>
      <div class="footer-section">
        <h2>Company</h2>
      </div>
      <div class="footer-section">
        <img src="../assets/logo.png" alt="Company Logo" class="logo1" width="50px" height="50px">
      </div>
      <div class="footer-section">
        <h2>Help Desk</h2>
      </div>
      <div class="footer-section">
        <h2>Blog</h2>
      </div>
      <div class="footer-section">
        <h2>Resources</h2>
      </div>
    </div>

    <hr><br>

    <a href="#">
      <img src="../assets/Facebook.png" alt="Facebook Icon" width="25px" height="25px">
    </a>

    <a href="#">
      <img src="../assets/Instagram.png" alt="Instagram Icon" width="25px" height="25px">
    </a>

    <a href="#">
      <img src="../assets/Twitter.png" alt="Twitter Icon" width="25px" height="25px">
    </a>

    <a href="#">
      <img src="../assets/Whatsapp.png" alt="Facebook Icon" width="25px" height="25px">
    </a>

    <div class="copyright">
      | © Elite Villa || Made by Ardjun Samuel & Vighnesh |
    </div>
  </footer>
    <?php
// Retrieve the top 3 bids from the database
$sql = "SELECT * FROM bids ORDER BY bid DESC LIMIT 3";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['firstName'] . " " . $row['lastName'] . ": €" . $row['bid'] . "</p>";
    }
}

$conn->close();

?>



  
</body>

</html>