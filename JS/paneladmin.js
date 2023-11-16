document.addEventListener('DOMContentLoaded', function () {
    //--DECLARACIÓN DE VARIABLES------------------------------------
        //var mostrarocultarusuarios = true;
        //var btnmostrar = document.getElementById('btnusuarios');
        var cuerpotabla = document.querySelector('.tablaadmin tbody');
        cuerpotabla.style.display = 'table-row-group';     //Le doy por defecto que no aparezca para evitar que salga mientras el botón nos dice mostrar usuarios, cuando en realidad estaríamos ocultándola.
    //--------------------------------------
    
    //--FUNCIONES------------------------------------
        /*function mostrarocultardatosadmin() {
    
            if (mostrarocultarusuarios) {
    
                btnmostrar.textContent = 'Ocultar Usuarios';
                btnmostrar.name = 'descargarusuarios';
                cuerpotabla.style.display = 'table-row-group';
    
            } else {
    
                cuerpotabla.style.display = 'none';
                btnmostrar.textContent = 'Mostrar Usuarios';
                btnmostrar.name = 'cargarusuarios';
                
            }
            mostrarocultarusuarios = !mostrarocultarusuarios;   //Actua de Switch, si al principio antes de clickar está true, pasa a false y viceversa
            actualizartablaadmin();  //Actualizamos la tabla siempre que realicemos un cambio
        }*/
    //--------------------------------------
     function actualizartablaadmin() {   //Con esta funcion generaremos la tabla en función a los datos que posea la base de datos, recibiendo estos a través de la API y generando a su vez los input para introducir usuarios
            fetch('../Api/usuario/solicitausuarios.php', {
                method: 'GET',
                headers:{
                    'Content-Type': 'application/json',
                }
            })
                .then((response) => {
                if (!response.ok) {
                    throw new Error('Error al obtener los datos de los usuarios.'); //Lanzamos el error para, si no se da una respuesta correcta, aparezca el error.
                }
                return response.json();
                })
                .then((datos) => {                    //Al poder actualizar la tabla de cualquier manera, usaremos a través de un botón los inputs para introducir usuarios y actualizar en tiempo real.

                        console.log(datos);     //Muestro los datos por consola.
                        cuerpotabla.innerHTML = '';      //Preparamos el espacio para generar la tabla
    
                        datos.forEach(function (usuario, incremento) {      //Para cada dato, creo una función en la que pasaré por  parámetro tanto al usuario como un incremento, el usuario para obtener sus propiedades en cada campo refiriéndonos al objeto
                                                                             //El incremento lo he puesto para que en cada id añada un número más tras pasar por cada usuario del foreach.
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
                                '<button type="submit" id="btneditar' + (incremento + 1) + '" name="btneditar" class="btneditar" onclick="editarUsuario(' + usuario.dni + ')"><p class="fa fa-edit"></p></button>' +
                                '<button type="submit" id="btnborrar' + (incremento + 1) + '" name="btnborrar" class="btnborrar"><p class="fa fa-times"></p></button>' +
                                '</form>' +
                                '</td>';
                            cuerpotabla.appendChild(row);      //Le damos a cuerpotabla los campos de row para que los dibuje.
                        });
    
                        var inputrow = document.createElement('tr');
                        inputrow.innerHTML =  '<form method="post" action="">' +
                            '<td><input type="text" id="nuevousuario" class="admininputs" placeholder="Nombre"></td>' +
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
                            '</td>' +
                            '</form>';
    
                            cuerpotabla.appendChild(inputrow);
    
                        var btnanadirusuario = document.getElementById('btnanadirusuario');     //Declaramos el boton para añadir el usuario en los inputs, y le damos un evento que cuando clickemos en él, nos agregue al usuario llamando a la función.
                        btnanadirusuario.addEventListener('click', agregarusuarioadmin);
                    })
                        .catch((error) => {
                            console.error(error.message);
                        });
                    }
    
    //--------------------------------------
    function agregarusuarioadmin() {     //Esta funcion llama a la api para guardar el usuario, creando y almacenando las propiedades de los datos que inteoducimos en los input.
        var nuevousuario = {
            nombre: document.getElementById('nuevousuario').value,
            dni: document.getElementById('nuevousuariodni').value,
            apellido1: document.getElementById('nuevousuarioapellido1').value,
            apellido2: document.getElementById('nuevousuarioapellido2').value,
            fechanacimiento: document.getElementById('nuevousuariofechadenacimiento').value,
            contrasena: document.getElementById('nuevousuariocontraseña').value,
            email: document.getElementById('nuevousuarioemail').value,
            rol: document.getElementById('nuevousuariorol').value
        };
    
        //Aqui realizamos el request
        fetch('../Api/usuario/guardausuario.php', {

            method: 'POST',
            headers:{
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(nuevousuario),

        })
            .then((response) => {
                if (!response.ok) {

                throw new Error('Error al agregar el usuario'); //Lanzamos el error para, si no se da una respuesta correcta, aparezca el error.

            }

                console.log('Usuario añadido correctamente.');
                alert('Usuario añadido correctamente.');
                actualizartablaadmin();

            })
            .catch((error) => {

                console.error(error.message);

            });
    }
        actualizartablaadmin();



    //--------------------------------------

        function borrarusuario() {
            cuerpotabla.addEventListener('click', function (evento) {   //Este evento obtiene a través de click el elemento que posea la clase btnborrar, previene
                                                                        //y declarando la celdadni, obtendremos su atributo datosdni que posee el dni del usuario a borrar, y gracias a la api
                                                                        //donde pasamos por parámetro el dni, comparamos y si es el mismo dni elimina al usuario de la base de datos, y actualiza.
                if (evento.target.classList.contains('btnborrar')) {
        
                    evento.preventDefault();
                    var celdadni = evento.target.closest('tr').querySelector('[datosdni]');
        
                    if (celdadni) {
                        var dni = celdadni.getAttribute('datosdni');
                        fetch('../Api/usuario/borrausuarios.php', {
    
                            method: 'POST',
                            headers:{
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ dni: dni }),
    
                        })
                        .then((response) => {
                            if (!response.ok) {
    
                                throw new Error('Error al eliminar el usuario.');   //Lanzamos el error para, si no se da una respuesta correcta, aparezca el error.
    
                            }
    
                            console.log('Usuario eliminado correctamente.');
                            alert('¡Atención! Tras eliminar un usuario, asegúrate de que su sesión se ha cerrado para que no pueda volver a acceder.');
                            actualizartablaadmin();
    
                        })
                        .catch((error) => {
    
                            console.error(error.message);
    
                        });
                    }
                }
            });
        }
    
        borrarusuario();
    
    
    
    //--EVENTOS------------------------------------
    
    
        /*btnmostrar.addEventListener('click', function (evento) {    //Este evento previene de que el botón actue normalmente y en su defecto ejecuta la función para ocultar o mostrar la tabla.
    
            evento.preventDefault();
            mostrarocultardatosadmin();
    
        });*/
    
    
    //--------------------------------------


});



























        
//HECHO CON XMLHTTPREQUEST, LO CAMBIO A FETCH PUES ES MÁS EFICIENTE Y GENERA MENOS ERRORES

/*document.addEventListener('DOMContentLoaded', function () {
//--DECLARACIÓN DE VARIABLES------------------------------------
    var mostrarocultarusuarios = true;
    var btnmostrar = document.getElementById('btnusuarios');
    var cuerpotabla = document.querySelector('.tablaadmin tbody');
    cuerpotabla.style.display = 'none';     //Le doy por defecto que no aparezca para evitar que salga mientras el botón nos dice mostrar usuarios, cuando en realidad estaríamos ocultándola.
//--------------------------------------

//--FUNCIONES------------------------------------
    function mostrarocultardatosadmin() {

        if (mostrarocultarusuarios) {

            btnmostrar.textContent = 'Ocultar Usuarios';
            btnmostrar.name = 'descargarusuarios';
            cuerpotabla.style.display = 'table-row-group';

        } else {

            cuerpotabla.style.display = 'none';
            btnmostrar.textContent = 'Mostrar Usuarios';
            btnmostrar.name = 'cargarusuarios';
            
        }
        mostrarocultarusuarios = !mostrarocultarusuarios;   //Actua de Switch, si al principio antes de clickar está true, pasa a false y viceversa
        actualizartablaadmin();  //Actualizamos la tabla siempre que realicemos un cambio
    }
//--------------------------------------
 function actualizartablaadmin() {   //Con esta funcion generaremos la tabla en función a los datos que posea la base de datos, recibiendo estos a través de la API y generando a su vez los input para introducir usuarios
                                        //Al poder actualizar la tabla de cualquier manera, usaremos a través de un botón los inputs para introducir usuarios y actualizar en tiempo real.
        var peticionajax = new XMLHttpRequest();

        peticionajax.onreadystatechange = function () {

            if (peticionajax.readyState === XMLHttpRequest.DONE) {

                if (peticionajax.status === 200) {   //Si la respuesta es OK:

                    var datos = JSON.parse(peticionajax.responseText);   //Declaro los datos, decodificados del JSON recibido.
                    console.log(datos);     //Muestro los datos por consola.
                    cuerpotabla.innerHTML = '';      //Preparamos el espacio para generar la tabla

                    datos.forEach(function (usuario, incremento) {      //Para cada dato, creo una función en la que pasaré por  parámetro tanto al usuario como un incremento, el usuario para obtener sus propiedades en cada campo refiriéndonos al objeto
                                                                         //El incremento lo he puesto para que en cada id añada un número más tras pasar por cada usuario del foreach.
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
                            '<button type="submit" id="btneditar' + (incremento + 1) + '" name="btneditar" class="btneditar"><p class="fa fa-edit"></p></button>' +
                            '<button type="submit" id="btnborrar' + (incremento + 1) + '" name="btnborrar" class="btnborrar"><p class="fa fa-times"></p></button>' +
                            '</form>' +
                            '</td>';
                        cuerpotabla.appendChild(row);      //Le damos a cuerpotabla los campos de row para que los dibuje.
                    });

                    var inputrow = document.createElement('tr');
                    inputrow.innerHTML =  '<form method="post" action="">' +
                        '<td><input type="text" id="nuevousuario" class="admininputs" placeholder="Nombre"></td>' +
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
                        '</td>' +
                        '</form>';

                        cuerpotabla.appendChild(inputrow);

                    var btnanadirusuario = document.getElementById('btnanadirusuario');     //Declaramos el boton para añadir el usuario en los inputs, y le damos un evento que cuando clickemos en él, nos agregue al usuario llamando a la función.
                    btnanadirusuario.addEventListener('click', agregarusuarioadmin);

                } else {

                    console.error('Error al obtener los datos de los usuarios.');

                }
            }
        };

        peticionajax.open('GET', '../Api/usuario/solicitausuarios.php', true);   //Solicitamos a la API en este caso a través de GET ya que queremos recoger los usuarios.
        peticionajax.setRequestHeader('Content-Type', 'application/json');
        peticionajax.send();     //Colocamos este send para que actualice en tiempo real.
    }


//--------------------------------------
function agregarusuarioadmin() {     //Esta funcion llama a la api para guardar el usuario, creando y almacenando las propiedades de los datos que inteoducimos en los input.
    var nuevousuario = {
        nombre: document.getElementById('nuevousuario').value,
        dni: document.getElementById('nuevousuariodni').value,
        apellido1: document.getElementById('nuevousuarioapellido1').value,
        apellido2: document.getElementById('nuevousuarioapellido2').value,
        fechanacimiento: document.getElementById('nuevousuariofechadenacimiento').value,
        contrasena: document.getElementById('nuevousuariocontraseña').value,
        email: document.getElementById('nuevousuarioemail').value,
        rol: document.getElementById('nuevousuariorol').value
    };

    //Aqui realizamos el request, probé a realizar esto con fetch pero creo que es más conveniente usar XMLHttpRequest ya que lo hemos visto en mayor profundidad en clase.
    var peticionajax = new XMLHttpRequest();

    peticionajax.onreadystatechange = function () {

        if (peticionajax.readyState === XMLHttpRequest.DONE) {

            if (peticionajax.status === 200) {   //Si el estatus recibido es 200 OK, nos mostrará una alerta y por consola que todo va bien, y actualiza la tabla.

                console.log('Usuario añadido correctamente.');
                alert('Usuario añadido correctamente.');
                actualizartablaadmin();

            } else {

                console.error('Error al agregar el usuario');

            }
        }
    };

    peticionajax.open('POST', '../Api/usuario/guardausuario.php', true);     //Llamamos a la api usando POST en este caso ya que vamos a introducir datos.
    peticionajax.setRequestHeader('Content-Type', 'application/json');
    peticionajax.send(JSON.stringify(nuevousuario));
}

//--EVENTOS------------------------------------


    btnmostrar.addEventListener('click', function (evento) {    //Este evento previene de que el botón actue normalmente y en su defecto ejecuta la función para ocultar o mostrar la tabla.

        evento.preventDefault();
        mostrarocultardatosadmin();

    });


//--------------------------------------
    cuerpotabla.addEventListener('click', function (evento) {   //Este evento obtiene a través de click el elemento que posea la clase btnborrar, previene
                                                                //y declarando la celdadni, obtendremos su atributo datosdni que posee el dni del usuario a borrar, y gracias a la api
                                                                //donde pasamos por parámetro el dni, comparamos y si es el mismo dni elimina al usuario de la base de datos, y actualiza.
        if (evento.target.classList.contains('btnborrar')) {

            evento.preventDefault();
            var celdadni = evento.target.closest('tr').querySelector('[datosdni]');

            if (celdadni) {

                var dni = celdadni.getAttribute('datosdni');
                var peticionajax = new XMLHttpRequest();

                peticionajax.onreadystatechange = function () {

                    if (peticionajax.readyState === XMLHttpRequest.DONE) {

                        if (peticionajax.status === 200) {

                            console.log('Usuario eliminado correctamente.');
                            alert('¡Atención! Tras eliminar un usuario, asegúrate de que su sesión se ha cerrado para que no pueda volver a acceder.');
                            actualizartablaadmin();

                        } else {

                            console.error('Error al eliminar el usuario.');
                        }
                    }
                };

                peticionajax.open('POST', '../Api/usuario/borrausuarios.php', true);   //Llamada a la API para borrar el usuario a través del dni.
                peticionajax.setRequestHeader('Content-Type', 'application/json');
                var datos = JSON.stringify({ dni: dni });
                peticionajax.send(datos);
            }
        }
    });
//--------------------------------------

//--Actualizamos de nuevo------------------------------------
        actualizartablaadmin();

});
*/








/*window.addEventListener("load", function(){

    var input = document.getElementById("input");

    input.addEventListener("keydown",function(ev){

        console.log(ev);

        if (isNaN(ev.key) && (!(ev.key=="Delete") || (ev.key=="ArrowLeft") || (ev.key=="ArrowRight") || (ev.key=="Backspace"))){
            ev.preventDefault();
        }
    })

})*/






/*window.addEventListener("load", function(){

    var input = document.getElementById("input");

    input.addEventListener("keydown",function(ev){

        console.log(ev);

        if (isNaN(ev.key) && (!(ev.key=="Delete") || (ev.key=="ArrowLeft") || (ev.key=="ArrowRight") || (ev.key=="Backspace"))){
            ev.preventDefault();
        }
    })

})*/

