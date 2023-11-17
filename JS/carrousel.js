document.addEventListener('DOMContentLoaded', () => {

    const carrousel = document.querySelector('.carrousel');  //Declaro esta constante para que seleccione la clase carrousel

    setInterval(() => { //Seteo un intervalo en el que le daré los siguientes estilos para generar el movimiento, translate x para mover la imagen fuera, transition para que la animación sea suave

        const elemento1 = carousel.firstElementChild;
        carrousel.style.transition = "transform 1s ease-in-out";
        carrousel.style.transform = "translateX(-100%)";
        
    setTimeout(() => {     //Seteo un timeout para que espere 1 segundo para comenzar a ejecutarse y cada 5 segundos cambiará de imagen

        carrousel.style.transition = "none";
        carrousel.style.transform = "translateX(0)";
        carrousel.appendChild(elemento1);

    }, 1000);
    }, 5000);
});