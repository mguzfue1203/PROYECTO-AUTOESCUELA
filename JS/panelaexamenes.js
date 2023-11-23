document.addEventListener('DOMContentLoaded', function () {
    var cuerpotabla = document.querySelector('.tablaexamenes tbody');
    cuerpotabla.style.display = 'table-row-group';

    function actualizartablapreguntas() {
        fetch('../Api/pregunta/solicitapreguntas.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error al obtener los datos de las preguntas.');
                }
                return response.json();
            })
            .then((preguntas) => {

                cuerpotabla.innerHTML = '';

                preguntas.forEach(function (pregunta, incremento) {
                    var row = document.createElement('tr');
                    row.innerHTML = '<td>' + pregunta.enunciado + '</td>' +
                        '<td>' + pregunta.respuesta + '</td>' +
                        '<td>' +
                        '<form method="post" action="">' +
                        '<button type="submit" id="btneditar' + (incremento + 1) + '" name="btneditar" class="btneditar" onclick="editarpregunta(' + pregunta.id + ')"><p class="fa fa-edit"></p></button>' +
                        '<button type="submit" id="btnborrar' + (incremento + 1) + '" name="btnborrar" class="btnborrar"><p class="fa fa-times"></p></button>' +
                        '</form>' +
                        '</td>';
                    cuerpotabla.appendChild(row);
                });

                var inputrow = document.createElement('tr');
                inputrow.innerHTML = '<form method="post" action="">' +
                    '<td><input type="text" id="nuevapregunta" class="admininputs" placeholder="Enunciado"></td>' +
                    '<td><input type="text" id="nuevarespuesta1" class="admininputs" placeholder="Respuesta 1"></td>' +
                    '<td><input type="text" id="nuevarespuesta2" class="admininputs" placeholder="Respuesta 2"></td>' +
                    '<td><input type="text" id="nuevarespuesta3" class="admininputs" placeholder="Respuesta 3"></td>' +
                    '<td><select id="nuevacorrecta" class="admininputs">' + 
                            '<option value="1">1</option>' +
                            '<option value="2">2</option>' +
                            '<option value="3">3</option>' +
                            '</select>' + 
                            '</td>' +
                            
                    '<td>' +
                    '<button id="btnanadirpregunta" class="btnanadirusuario">Añadir</button>' +
                    '</td>' +
                    '</form>';

                cuerpotabla.appendChild(inputrow);

                var btnanadirpregunta = document.getElementById('btnanadirpregunta');
                btnanadirpregunta.addEventListener('click', agregarpregunta);
            })
            .catch((error) => {
                console.error(error.message);
            });
    }

    function agregarpregunta() {
        var enunciado = document.getElementById('nuevapregunta').value;
        var respuesta1 = document.getElementById('nuevarespuesta1').value;
        var respuesta2 = document.getElementById('nuevarespuesta2').value;
        var respuesta3 = document.getElementById('nuevarespuesta3').value;
        var respuestacorrecta = document.getElementById('nuevacorrecta').value;
    
        var nuevapregunta = {
            enunciado: enunciado,
            opciones: [respuesta1, respuesta2, respuesta3],
            respuestacorrecta: respuestacorrecta - 1,
        };
    
        fetch('../Api/pregunta/solicitapreguntas.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(nuevapregunta),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error al agregar la pregunta');
                }
    
                console.log('Pregunta añadida correctamente.');
                alert('Pregunta añadida correctamente.');
                actualizartablapreguntas();
            })
            .catch((error) => {
                console.error(error.message);
            });
    }
    

    function borrarpregunta() {
        cuerpotabla.addEventListener('click', function (evento) {
            if (evento.target.classList.contains('btnborrar')) {
                evento.preventDefault();
                
                var id = evento.target.closest('tr').querySelector('[id^="btneditar"]').id.replace('btneditar', '');

                fetch('../Api/pregunta/borrapregunta.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: id }),
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Error al eliminar la pregunta.');
                        }

                        console.log('Pregunta eliminada correctamente.');
                        alert('Pregunta eliminada correctamente.');
                        actualizartablapreguntas();
                    })
                    .catch((error) => {
                        console.error(error.message);
                    });
            }
        });
    }

    actualizartablapreguntas();
    borrarpregunta();
});