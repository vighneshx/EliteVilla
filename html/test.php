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

// Retrieve the villa number from the URL parameters
$villaNumber = '';

if (isset($_GET['villa'])) {
    $villaNumber = $_GET['villa'];
}

// Define the villa information arrays
$villas = [
    'villa1' => [
        'title' => 'Holiday Home Villa Poss',
        'description' => 'Holiday Home Villa Poss offers free WiFi and is located in Villa, 42 km from the Serravalle Golf Club and 1.8 km from Villa. This holiday home features a private pool, a garden, and free private parking.
        The holiday home has 6 bedrooms, a TV, an equipped kitchen with a dishwasher and a microwave, a washing
        machine, and 5 bathrooms with a shower.
        The nearest airport is Genoa Cristoforo Colombo, 75 km from the holiday home.
        Holiday Home Villa Poss has been welcoming guests from Booking.com since March 31, 2016.
        Distance in accommodation description calculated with © OpenStreetMap.',
        'location' => 'Holiday Home Villa Maria, Corso Italia, Giarre, Metropolitan city of Catania, Italy',
        'mapUrl' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Holiday%20Home%20Villa%20Maria,%20Corso%20Italia,%20Giarre,%20Metropolitan%20city%20of%20Catania,%20Italy+(Holiday%20Home%20Villa%20Poss)&amp;t=k&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
        'cssFile' => 'villa1.css'
    ],
    'villa2' => [
        'title' => 'La Corte Nascosta Volpedo',
        'description' => 'La Corte Nascosta Volpedo offers air-conditioned accommodations in Volpedo. As guests, you can enjoy the
          garden.
        The accommodations are equipped with a wardrobe. You will also find a private bathroom with a bidet.
        In the morning, you can enjoy an Italian breakfast.
        La Corte Nascosta Volpedo is located 35 km from Pavia, 31 km from Alessandria, and 54 km from Genoa
          Cristoforo Colombo Airport.
        La Corte Nascosta Volpedo has been welcoming guests from Booking.com since October 19, 2021.
        Distances in the property description are calculated with © OpenStreetMap.',
        'location' => 'La Corte Nascosta Volpedo',
        'mapUrl' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%20La%20Corte%20Nascosta%20Volpedo%20+(%20La%20Corte%20Nascosta%20Volpedo%20)&amp;t=k&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
        'cssFile' => 'villa2.css'
    ],
    'villa3' => [
        'title' => 'Tenuta Terensano Villa',
        'description' => ' Agriturismo Terensano is een 18e-eeuws gebouw op de top van een heuvel. De accommodatie ligt midden tussen de
          wijngaarden aan het begin van de Curonevallei. De kamers zijn traditioneel en rustiek ingericht en het
          restaurant is gespecialiseerd in regionale gerechten. Parkeren is gratis. 

          Het Terensano beschikt over een prachtige tuin en een buitenzwembad dat uitkijkt op de wijngaarden en op de
          heuvels en valleien in de verte. De kamers zijn allemaal uitgerust met een flatscreen-tv met
          satellietzenders.

          Het restaurant is geopend voor lunch en diner. Er worden regionale specialiteiten uit de regio Piemonte en
          Lombardije geserveerd. Ook staan er klassiek Italiaanse maaltijden op het menu. Het ontbijt is
          continentaal.

          Het Agriturismo Terensano ligt dicht bij de gezondheidsspa en wellnesscentrum in Salice Terme. U rijdt in 1
          uur naar Milaan, Turijn en Genua.
          Stellen kunnen met name de locatie waarderen — ze gaven een score van 9,1 voor een reis voor twee.

          Tenuta Terensano verwelkomt gasten van Booking.com sinds 15 aug 2008.',
        'location' => 'Tenuta Terensano Villa',
        'mapUrl' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Tenuta%20Terensano%20Villa+(Tenuta%20Terensano%20Villa)&amp;t=k&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
        'cssFile' => 'villa3.css'
    ]
];

$villaInfo = $villas[$villaNumber];
$cssFile = $villaInfo['cssFile'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/<?php echo $cssFile; ?>">
    <title>Elite Villa - <?php echo $villaInfo['title']; ?></title>
</head>

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
				<a href="main.html">Login</a><li>
				<a href="main.html">Register</a><li>
            </div>

        </nav>
    </header>
	
	
	

    <main class="main-content">
        <div class="left-column">
            <section id="villa-description">
                <h1><?php echo $villaInfo['title']; ?></h1>
                <p><?php echo $villaInfo['description']; ?></p>
                <button type="submit">Learn More</button>
            </section>

            <section id="villa-location">
                <h2>Location</h2>
                <div id="map">
                    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $villaInfo['mapUrl']; ?>"></iframe></div>
                </div>
            </section>
        </div>

        <div class="right-column">
            <h2>Hoogste biedingen</h2>
            <section id="bidding-section">
                <div id="bids">
                    <?php
                    // Retrieve the top 3 bids from the database
                    $sql = "SELECT * FROM bids WHERE villaNumber = '$villaNumber' ORDER BY bid DESC LIMIT 3";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>{$row['firstName']} {$row['lastName']}: €{$row['bid']}</p>";
                        }
                    }
                    ?>
                </div>

                <div id="place-bid">
                    <h2>Doe een bod</h2>
                    <form id="bidForm" action="bid.php" method="post">

						<input type="text" name="villaNumber" placeholder="villaNumber" value="<?php echo $villaNumber; ?>" hidden>
                        <input type="text" name="firstName" placeholder="Voornaam" required>
                        <input type="text" name="lastName" placeholder="Achternaam" required>
                        <input type="tel" name="phoneNumber" placeholder="Telefoonnummer" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="number" name="bid" placeholder="Bod" min="1000000" max="100000000" required>
                        <input type="submit" value="Doe een bod">
                    </form>
                </div>
            </section>
        </div>
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
      | © Elite Villa || Made by Ardjun, Samuel & Vighnesh |
    </div>
  </footer>
</body>

</html>
