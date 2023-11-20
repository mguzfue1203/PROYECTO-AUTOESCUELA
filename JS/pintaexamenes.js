document.addEventListener('DOMContentLoaded', function () {
    // --VARIABLES---------------------------------------------------
    var mostrarocultardatos = false;
    var btncomenzar = document.getElementById("empezar");
    var divexamen = document.getElementById("examen");

    // --FUNCIONES---------------------------------------------------
    btncomenzar.addEventListener("click", function () {

        empezar();
        mostrarocultar();

    });

    function mostrarocultar() {
        if (mostrarocultardatos) {
            btncomenzar.style.display = 'block';
        } else {
            btncomenzar.style.display = 'none';
        }

        mostrarocultardatos = !mostrarocultardatos; // Actua de Switch, si al principio antes de clickar está true, pasa a false y viceversa
    }

    function empezar() {
        fetch('../plantillas/preguntas.php')
            .then(x => x.text())
            .then(y => {
                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var pregunta = contenedor.firstChild;

                fetch('../Api/pregunta/solicitapreguntas.php')
                    .then(x => x.json())
                    .then(y => {
                        for (let incremento = 0; incremento < y.length; incremento++) {

                            var pregcopy = pregunta.cloneNode(true);
                            
                            pregcopy.getElementsByClassName("id")[0].innerHTML = y[incremento].enunciado;

                            var opciones = JSON.parse(y[incremento].respuesta).opciones;

                            for (let incremento2 = 0; incremento2 < opciones.length; incremento2++) {

                                var radioinput = document.createElement("input");
                                radioinput.type = "radio";
                                radioinput.name = "respuesta_" + y[incremento].id;
                                radioinput.value = incremento2 + 1;
                            
                                var label = document.createElement("label");
                                label.appendChild(radioinput);
                                label.appendChild(document.createTextNode(opciones[incremento2]));
                            
                                var labelcnt = document.createElement("div");
                                labelcnt.appendChild(label);
                            
                                pregcopy.getElementsByClassName("respuesta")[0].appendChild(labelcnt);

                            }                            
                            pregcopy.getElementsByClassName("url")[0].innerHTML = y[incremento].url;
                            pregcopy.getElementsByClassName("tipourl")[0].innerHTML = y[incremento].tipourl;

                            var pregpadre = pregcopy;
                            while (pregpadre && !pregpadre.classList.contains("pregunta")) {

                                var dudaElement = pregcopy.getElementsByClassName("duda")[0];

                                if (dudaElement) {
                                    dudaElement.checked = false;
                                }

                                pregpadre = pregpadre.parentNode;

                                
                            }

                            pregcopy.getElementsByClassName("borrar")[0].addEventListener("click", function () {
                                var opcionesRadio = this.closest('.pregunta').querySelectorAll('input[type="radio"]');
                                
                                opcionesRadio.forEach(function (opcion) {
                                    opcion.checked = false;
                                });
                            });
                            
                            divexamen.appendChild(pregcopy);
                        }
                    });
            });
    }
});