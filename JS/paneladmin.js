document.addEventListener('DOMContentLoaded', function () {

    var mostrarocultarusuarios = true;
    var btnmostrar = document.getElementById('btnusuarios');
    var tableBody = document.querySelector('.tablaadmin tbody');

    btnmostrar.addEventListener('click', function (evento) {
        evento.preventDefault();

        if (mostrarocultarusuarios) {
            btnmostrar.textContent = 'Ocultar Usuarios';
            btnmostrar.name = 'descargarusuarios';
            tableBody.style.display = 'table-row-group';    //Si lo hiciera con flexbox no podría tras mostrar y ocultar volver a mostrar los datos.
        } else {
            tableBody.style.display = 'none';
            btnmostrar.textContent = 'Mostrar Usuarios';
            btnmostrar.name = 'cargarusuarios';
        }

        mostrarocultarusuarios = !mostrarocultarusuarios; //Cada vez que clicko me cambia el estado de true a false y viceversa


            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var datos = JSON.parse(xhr.responseText);
                        console.log(datos);
                        tableBody.innerHTML = '';

                        datos.forEach(function (usuario, incremento) {
                            var row = document.createElement('tr');
                            row.innerHTML = '<td id="usuario' + (incremento + 1) + 'nombre">' + usuario.nombre + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'dni" datosdni="' + usuario.dni + '">' + usuario.dni + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'apellido1">' + usuario.apellido1 + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'apellido2">' + usuario.apellido2 + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'fechanacimiento">' + usuario.fechanacimiento + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'contrasena">' + usuario.contrasena + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'email">' + usuario.email + '</td>' +
                                '<td id="usuario' + (incremento + 1) + 'rol">' + usuario.rol + '</td>' +
                                '<td>' +
                                '<form method="post" action="">' +
                                '<button type="submit" id="btneditar' + (incremento + 1) + '" name="btneditar" class="btneditar">Editar</button>' +
                                '<button type="submit" id="btnborrar' + (incremento + 1) + '" name="btnborrar" class="btnborrar">Eliminar</button>' +
                                '</form>' +
                                '</td>';
                            tableBody.appendChild(row);
                        });
                                var inputrow = document.createElement('tr');
                                inputrow.innerHTML = '<td><input type="text" id="nuevousuario" class="admininputs" placeholder="Nombre"></td>' +
                                    '<td><input type="text" id="nuevousuariodni" class="admininputs" placeholder="DNI"></td>' +
                                    '<td><input type="text" id="nuevousuarioapellido1" class="admininputs" placeholder="Apellido"></td>' +
                                    '<td><input type="text" id="nuevousuarioapellido2" class="admininputs" placeholder="Apellido"></td>' +
                                    '<td><input type="date" id="nuevousuariofechadenacimiento" class="admininputs"></td>' +
                                    '<td><input type="password" id="nuevousuariocontraseña" class="admininputs" placeholder="Contraseña"></td>' +
                                    '<td><input type="email" id="nuevousuarioemail" class="admininputs" placeholder="Email"></td>' +
                                    '<td><select id="nuevousuariorol" class="admininputs">' + 
                                    '<option value="administrador">Administrador</option>' +
                                    '<option value="profesor">Profesor</option>' +
                                    '<option value="usuario">Usuario</option>' +
                                    '</td>' +
                                    '<td>' +
                                    '<button id="btnanadirusuario" class="btnanadirusuario">Añadir</button>' +
                                    '</td>';
                        
                                tableBody.appendChild(inputrow);

                    
                        document.getElementById('btnusuarios').addEventListener('click', function (evento) {
                            evento.preventDefault();
                            xhr.open('GET', '../Api/solicitausuarios.php', true);
                            xhr.send();
                        });

                        
                        tableBody.addEventListener('click', function (evento) {
                            if (evento.target.classList.contains('btnborrar')) {
                                evento.preventDefault();
                                var celdadni = evento.target.closest('tr').querySelector('[datosdni]');
                                if (celdadni) {
                                    var dni = celdadni.getAttribute('datosdni');

                                    var borrarxhr = new XMLHttpRequest();
                                    
                                    borrarxhr.onreadystatechange = function () {

                                        if (borrarxhr.readyState === XMLHttpRequest.DONE) {

                                            if (borrarxhr.status === 200) {

                                                console.log('Usuario eliminado correctamente.');

                                                alert('¡Atención! Tras eliminar un usuario has de comprobar que su sesión se ha cerrado para que no pueda volver a acceder.');

                                                xhr.open('GET', '../Api/solicitausuarios.php', true);
                                                xhr.send(); 

                                            } else {
                                                console.error('Error al eliminar el usuario.');
                                            }
                                        }
                                    };

                                    borrarxhr.open('POST', '../Api/borrausuarios.php', true);
                                    borrarxhr.setRequestHeader('Content-Type', 'application/json');
                                    var datos = JSON.stringify({ dni: dni });
                                    borrarxhr.send(datos);
                                }
                            }
                        });
                    } else {
                        console.error('Error al obtener los datos de los usuarios.');
                    }
                }
            };

            xhr.open('GET', '../Api/solicitausuarios.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send();
});
})









/*window.addEventListener("load", function(){

    var input = document.getElementById("input");

    input.addEventListener("keydown",function(ev){

        console.log(ev);

        if (isNaN(ev.key) && (!(ev.key=="Delete") || (ev.key=="ArrowLeft") || (ev.key=="ArrowRight") || (ev.key=="Backspace"))){
            ev.preventDefault();
        }
    })

})*/

