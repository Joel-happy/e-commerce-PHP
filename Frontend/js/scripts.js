
//caroussel
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
//caroussel


