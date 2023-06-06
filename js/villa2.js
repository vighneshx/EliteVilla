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