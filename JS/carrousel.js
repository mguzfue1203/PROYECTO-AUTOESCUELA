document.addEventListener('DOMContentLoaded', () => {

    const carousel = document.querySelector('.carrousel');

    setInterval(() => {

        const firstItem = carousel.firstElementChild;
        carousel.style.transition = "transform 1s ease-in-out";
        carousel.style.transform = "translateX(-100%)";
        
    setTimeout(() => {

        carousel.style.transition = "none";
        carousel.style.transform = "translateX(0)";
        carousel.appendChild(firstItem);

    }, 1000);
    }, 5000);
});