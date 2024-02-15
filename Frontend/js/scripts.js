/*!
* Start Bootstrap - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');

    function showItem(index) {
        items.forEach(item => item.style.display = 'none');
        items[index].style.display = 'block';
    }

    function next() {
        currentIndex = (currentIndex + 1) % items.length;
        showItem(currentIndex);
    }

    function autoSlide() {
        next();
    }

    // Changer d'image toutes les 3 secondes
    setInterval(autoSlide, 2000);

    // Afficher la première image au chargement de la page
    showItem(currentIndex);
});
