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