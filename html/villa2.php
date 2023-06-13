<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/villa2.css">
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
        <h1>La Corte Nascosta Volpedo</h1>
        <p>La Corte Nascosta Volpedo offers air-conditioned accommodations in Volpedo. As guests, you can enjoy the
          garden.</p>
        <p>The accommodations are equipped with a wardrobe. You will also find a private bathroom with a bidet.</p>
        <p>In the morning, you can enjoy an Italian breakfast.</p>
        <p>La Corte Nascosta Volpedo is located 35 km from Pavia, 31 km from Alessandria, and 54 km from Genoa
          Cristoforo Colombo Airport.</p>
        <p>La Corte Nascosta Volpedo has been welcoming guests from Booking.com since October 19, 2021.</p>
        <p>Distances in the property description are calculated with © OpenStreetMap.</p>
        <button type="submit">Learn More</button>
      </section>

      <section id="villa-location">
        <h2>Location</h2>
        <div id="map">
          <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%20La%20Corte%20Nascosta%20Volpedo%20+(%20La%20Corte%20Nascosta%20Volpedo%20)&amp;t=k&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure acres/hectares on map</a></iframe></div>
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
          <form id="bidForm" onsubmit="saveBid(event)">
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