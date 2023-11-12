document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnusuarios').addEventListener('click', function (evento) {
        evento.preventDefault();

        var botonmostrarusuarios = document.getElementById('mostrarusers');
        botonmostrarusuarios.style.display = "none";

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {

            if (xhr.readyState === XMLHttpRequest.DONE) {

                if (xhr.status === 200) {

                    var data = JSON.parse(xhr.responseText);
                    console.log(data);

                    var tableBody = document.querySelector('.tablaadmin tbody');
                    tableBody.innerHTML = '';

                    data.forEach(function (usuario) {
                        var row = document.createElement('tr');
                        row.innerHTML = '<td>' + usuario.nombre + '</td>' +
                            '<td>' + usuario.dni + '</td>' +
                            '<td>' + usuario.apellido1 + '</td>' +
                            '<td>' + usuario.apellido2 + '</td>' +
                            '<td>' + usuario.fechanacimiento + '</td>' +
                            '<td>' + usuario.contrasena + '</td>' +
                            '<td>' + usuario.email + '</td>' +
                            '<td>' + usuario.rol + '</td>' +
                            '<td>' +
                            '<form method="post" action="">' +
                            '<button type="submit" id="btneditar" name="btneditar">Editar</button>' +
                            '<button type="submit" id="btnborrar" name="btnborrar">Eliminar</button>' +
                            '</form>' +
                            '</td>';
                        tableBody.appendChild(row);
                        
                    });
                    tableBody.addEventListener('click', function(event) {
                        if (event.target && event.target.name === 'btnborrar') {
                            var dni = event.target.getAttribute('data-dni');
                            eliminarusuario(dni);
                        }
                    });
                } else {

                    console.error('Error al recoger los datos.');

                }
            }
        };

        xhr.open('GET', '../Api/solicitausuarios.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send();



    



    });
});
