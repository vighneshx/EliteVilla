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

    // Prepare and execute the SQL query to insert the bid into the database
    $sql = "INSERT INTO bids (firstName, lastName, phoneNumber, email, bid) VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$bid')";
    if ($conn->query($sql) === TRUE) {
        echo "Bid submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve the villa number from the URL parameters
$villaNumber = isset($_GET['villa']) ? $_GET['villa'] : '';

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

// Check if the requested villa number exists in the villas array
if (!array_key_exists($villaNumber, $villas)) {
    // Redirect to a default page or show an error message
    header('Location: default.php');
    exit;
}

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
        <!-- Header content goes here -->
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
                    <!-- Top 3 bids here -->
                </div>

                <div id="place-bid">
                    <h2>Doe een bod</h2>
                    <form id="bidForm" action="<?php echo $_SERVER['PHP_SELF'] . '?villa=' . $villaNumber; ?>" method="post" onsubmit="saveBid(event)">
                        <input type="text" id="firstName" placeholder="Voornaam" required>
                        <input type="text" id="lastName" placeholder="Achternaam" required>
                        <input type="tel" id="phoneNumber" placeholder="Telefoonnummer" required>
                        <input type="email" id="email" placeholder="Email" required>
                        <input type="number" id="bid" placeholder="Bod" min="0" required>
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
      | © Elite Villa || Made by Ardjun Samuel & Vighnesh |
    </div>
  </footer>

  <script>
    let bids = [];

    function saveBid(event) {
      event.preventDefault();

      // Verzamel de data
      var firstName = document.getElementById('firstName').value;
      var lastName = document.getElementById('lastName').value;
      var phoneNumber = document.getElementById('phoneNumber').value;
      var email = document.getElementById('email').value;
      var bidInput = document.getElementById('bid');
      var bid = Number(bidInput.value);

      // Controleer of het bod hoger is dan het hoogste bod
      if (bids.length > 0 && bid <= Math.max(...bids.map(b => b.bid))) {
        alert('Je bod moet hoger zijn dan het huidige hoogste bod.');
        bidInput.classList.add('error');
        return;
      }

      bidInput.classList.remove('error');

      // Voeg het bod toe aan de lijst van biedingen
      bids.push({
        firstName,
        lastName,
        phoneNumber,
        email,
        bid
      });

      // Sorteer de biedingen en toon de top 3
      bids.sort((a, b) => b.bid - a.bid);
      let topBids = bids.slice(0, 3);

      let bidDiv = document.getElementById('bids');
      bidDiv.innerHTML = '';
      for (let bid of topBids) {
        bidDiv.innerHTML += `<p>${bid.firstName} ${bid.lastName}: €${bid.bid}</p>`;
      }

      // Reset het formulier
      document.getElementById('bidForm').reset();
    }
  </script>
</body>

</html>
