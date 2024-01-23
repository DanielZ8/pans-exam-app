var category_select = document.getElementById('category');
var category_item = document.querySelectorAll('.category-item');
var elements_h6 = document.getElementsByTagName('h6');
var pytanie_edit_pen = document.querySelector('.pytanie-edit-pen');

/* for (var i = 0; i < elements_h6.length; i++) {
  elements_h6[i].classList.add('h6', 'pytanie-tresc');
} */

function show(id){
    console.log(id);

    var odp = document.querySelector('.' + id);

    odp.classList.toggle("show");

}

function show_cat(id){
    console.log(id);
    var odp = document.querySelector('.c' + id);
    var icon_cat = document.querySelector('.ic'+id);

    icon_cat.classList.toggle("icon-category");
  /*   icon_cat.classList.toggle("icon-chevron-down");
    icon_cat.classList.toggle("icon-chevron-double-right"); */
    icon_cat.classList.toggle("icon-category-active");
    odp.classList.toggle("show_flex");
}

category_select.addEventListener('change', function() {
  // Pobierz wybraną wartość
  var wybranaOpcja = category_select.value;
  var iloscOpcji = category_select.length-1;
  displayCategory(wybranaOpcja, iloscOpcji);
});

function displayCategory(wybranaOpcja, iloscOpcji){
  if(wybranaOpcja == 'all'){
    for(let i=0; i<iloscOpcji; i++){
      category_item[i].style.display = "flex";
    }
  }
  else{
    for(let i=0; i<iloscOpcji; i++){
      category_item[i].style.display = "none";
    }
    category_item[wybranaOpcja-1].style.display = "flex";
  }
}