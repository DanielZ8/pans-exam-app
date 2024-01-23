var elements_h6 = document.getElementsByTagName('h6');
var pytanie_edit_pen = document.querySelector('.pytanie-edit-pen');
var pytanie_edit_k_pen = document.querySelector('.pytanie-edit-k-pen');
var pytanie_edit_d_pen = document.querySelector('.pytanie-edit-d-pen');

var pytanie_tresc_edit = document.getElementById('pytanie_tresc_edit');
var pytanie_odp_d = document.getElementById('pytanie-odp-d');
var pytanie_odp_k = document.getElementById('pytanie-odp-k');

var pytanie_tresc_hide= document.querySelector('.pytanie-tresc-hide');
var pytanie_odp_k_hide =  document.querySelector('.pytanie-odp-k-hide');
var pytanie_odp_d_hide =  document.querySelector('.pytanie-odp-d-hide');

for (var i = 0; i < elements_h6.length; i++) {
  elements_h6[i].classList.add('h4', 'pytanie-tresc');
  var additionalText = document.createTextNode( "{{ $pytanie->numer_pytania}}");
}


pytanie_edit_pen.addEventListener('click', function() {
    var elementScroll = document.getElementById('scroll1'); // Zamiast 'idElementu' użyj rzeczywistego ID elementu

    // Pobierz wybraną wartość
    pytanie_tresc_edit.disabled = !pytanie_tresc_edit.disabled;
    pytanie_tresc_hide.classList.toggle('show-pytanie-edit');
    window.scrollTo({
        top: elementScroll.offsetTop - 65, // Przewiń do elementu o 50 pikseli powyżej górnej krawędzi
        behavior: 'smooth' // Opcjonalne: płynne przewijanie
      });

});
pytanie_edit_k_pen.addEventListener('click', function() {
    var elementScroll = document.getElementById('scroll2'); // Zamiast 'idElementu' użyj rzeczywistego ID elementu
  // Pobierz wybraną wartość
  pytanie_odp_k.disabled = !pytanie_odp_k.disabled;
  pytanie_odp_k_hide.classList.toggle('show-pytanie-edit2');

  window.scrollTo({
    top: elementScroll.offsetTop - 65, // Przewiń do elementu o 50 pikseli powyżej górnej krawędzi
    behavior: 'smooth' // Opcjonalne: płynne przewijanie
  });
});
pytanie_edit_d_pen.addEventListener('click', function() {
    var elementScroll = document.getElementById('scroll3'); // Zamiast 'idElementu' użyj rzeczywistego ID elementu
  // Pobierz wybraną wartość
  pytanie_odp_d.disabled = !pytanie_odp_d.disabled;
  pytanie_odp_d_hide.classList.toggle('show-pytanie-edit2');

  window.scrollTo({
    top: elementScroll.offsetTop - 65, // Przewiń do elementu o 50 pikseli powyżej górnej krawędzi
    behavior: 'smooth' // Opcjonalne: płynne przewijanie
  });
});

