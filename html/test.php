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
    <link rel="stylesheet" href="../css/villa.css">
    <title>Elite Villa</title>
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
                <a href="#" class="btn">Login</a>
                <a href="#" class="btn reg">Register</a>
            </div>

        </nav>
    </header>


    <main class="main-content">
        <div class="left-column">
            <section id="villa1-description">
                <h1>Holiday Home Villa Poss</h1>
                <p>Holiday Home Villa Poss offers free WiFi and is located in Villa, 42 km from the Serravalle Golf Club and 1.8 km from Villa. This holiday home features a private pool, a garden, and free private parking.</p>
                <p>The holiday home has 6 bedrooms, a TV, an equipped kitchen with a dishwasher and a microwave, a washing machine, and 5 bathrooms with a shower.</p>
                <p>The nearest airport is Genoa Cristoforo Colombo, 75 km from the holiday home.</p>
                <p>Holiday Home Villa Poss has been welcoming guests from Booking.com since March 31, 2016.</p>
                <p>Distance in accommodation description calculated with © OpenStreetMap.</p>
                <button type="submit">Learn More</button>
            </section>

            <section id="villa2-description">
                <h1>La Corte Nascosta Volpedo</h1>
                <p>La Corte Nascosta Volpedo offers air-conditioned accommodations in Volpedo. As guests, you can enjoy the garden.</p>
                <p>The accommodations are equipped with a wardrobe. You will also find a private bathroom with a bidet.</p>
                <p>In the morning, you can enjoy an Italian breakfast.</p>
                <p>La Corte Nascosta Volpedo is located 35 km from Pavia, 31 km from Alessandria, and 54 km from Genoa Cristoforo Colombo Airport.</p>
                <p>La Corte Nascosta Volpedo has been welcoming guests from Booking.com since October 19, 2021.</p>
                <p>Distances in the property description are calculated with © OpenStreetMap.</p>
                <button type="submit">Learn More</button>
            </section>

            <section id="villa3-description">
                <h1>Tenuta Terensano Villa</h1>
                <p>Agriturismo Terensano is een 18e-eeuws gebouw op de top van een heuvel. De accommodatie ligt midden tussen de wijngaarden aan het begin van de Curonevallei. De kamers zijn traditioneel en rustiek ingericht en het restaurant is gespecialiseerd in regionale gerechten. Parkeren is gratis.</p>
                <p>Het Terensano beschikt over een prachtige tuin en een buitenzwembad dat uitkijkt op de wijngaarden en op de heuvels en valleien in de verte. De kamers zijn allemaal uitgerust met een flatscreen-tv met satellietzenders.</p>
                <p>Het restaurant is geopend voor lunch en diner. Er worden regionale specialiteiten uit de regio's Piemonte en Lombardije geserveerd. Ook staan er klassiek Italiaanse maaltijden op het menu. Het ontbijt is continentaal.</p>
                <p>Het Agriturismo Terensano ligt dicht bij de gezondheidsspa en wellnesscentrum in Salice Terme. U rijdt in 1 uur naar Milaan, Turijn en Genua.</p>
                <p>Stellen kunnen met name de locatie waarderen — ze gaven een score van 9,1 voor een reis voor twee.</p>
                <p>Tenuta Terensano verwelkomt gasten van Booking.com sinds 15 aug 2008.</p>
                <button type="submit">Learn More</button>
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
