document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnusuarios').addEventListener('click', function (event) {
        event.preventDefault(); // Previene la acción predeterminada del formulario (redirección)
        fetch('../Api/solicitausuarios.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Agrega esta línea para verificar la respuesta de la API
            var tableBody = document.querySelector('.tablaadmin tbody');
            tableBody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos
            data.forEach(function (user) {
                var row = document.createElement('tr');
                row.innerHTML = '<td>' + user.nombre + '</td>' +
                               '<td>' + user.dni + '</td>' +
                               '<td>' + user.apellido1 + '</td>' +
                               '<td>' + user.apellido2 + '</td>' +
                               '<td>' + user.fechanacimiento + '</td>' +
                               '<td>' + user.contrasena + '</td>' +
                               '<td>' + user.email + '</td>' +
                               '<td>' + user.rol + '</td>' +
                               '<td>Acciones</td>'; // Puedes personalizar las acciones
                tableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error(error);
        });
    });
});