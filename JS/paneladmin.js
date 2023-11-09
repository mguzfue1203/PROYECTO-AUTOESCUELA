document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnusuarios').addEventListener('click', function (event) {
        event.preventDefault(); // 
        fetch('../Api/solicitausuarios.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); 
            var tableBody = document.querySelector('.tablaadmin tbody');

            tableBody.innerHTML = ''; // 
            
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
                               '<td>Acciones</td>'; // P
                tableBody.appendChild(row);
            });
        })
        .catch(error => {

            console.error(error);
            
        });
    });
});