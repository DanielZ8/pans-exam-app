var elements_h6 = document.getElementsByTagName('h6');
for (var i = 0; i < elements_h6.length; i++) {
  elements_h6[i].classList.add('h6', 'pytanie-tresc');
} 


function show(id){
    console.log(id);

    var odp = document.querySelector('.' + id);

    odp.classList.toggle("show");

}

// Funkcja konwertująca sekundy na format mm:ss
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
  }

  // Funkcja odliczająca czas
  function startTimer(duration) {
    let timer = duration;
    const display = document.getElementById('timer');

    function updateTimer() {
      display.textContent = formatTime(timer);

      if (timer <= 0) {
        clearInterval(intervalId);
        alert("Czas minął!");
      } else {
        timer--;
      }
    }

    // Wywołaj funkcję co sekundę
    const intervalId = setInterval(updateTimer, 1000);
  }

  // Uruchom odliczanie na 90 minut (90 minut * 60 sekund)
  startTimer(90 * 60);
