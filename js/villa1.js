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

 
        




        const slideshowContainer = document.querySelector('.slideshow-container');
const slides = Array.from(slideshowContainer.querySelectorAll('.slide'));
const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightbox-image');

let currentIndex = 0;

function changeSlide(direction) {
  currentIndex += direction;

  if (currentIndex < 0) {
    currentIndex = slides.length - 1;
  } else if (currentIndex >= slides.length) {
    currentIndex = 0;
  }

  slideshowContainer.style.transition = "transform 2.5s ease-in-out";
  slideshowContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function openLightbox(index) {
  lightbox.style.display = 'flex';
  lightboxImage.src = slides[index].querySelector('img').src;
}

function closeLightbox() {
  lightbox.style.display = 'none';
}

setInterval(() => {
  changeSlide(1);
}, 4000);


    