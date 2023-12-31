document.addEventListener('DOMContentLoaded', function () {

    //Defino constante login y del mensaje
    const login = document.getElementById('formulario-login');
    const mensaje = document.getElementById('mensaje');


    login.addEventListener('submit', function (evento){

        evento.preventDefault();

        //Definimos el usuario y la contraseña que recogeremos por valores del form
        const usuario = document.getElementById('usuario').value;
        const contrasena = document.getElementById('contrasena').value;

        //Creo un pequeño objeto con la finalidad de insertar los datos de las constantes anteriores en ellos y así poder enviarlos al server
        const datosform = new FormData();
        datosform.append('usuario', usuario);
        datosform.append('contrasena', contrasena);

        //Creamos una solicitud por AJAX al server y comprobamos las credenciales
        const peticionajax = new XMLHttpRequest();
        peticionajax.open('POST', '../Helpers/login.php', true);
        peticionajax.setRequestHeader('X-Requested-With','XMLHttpRequest');

        peticionajax.onreadystatechange = function () {

            if (peticionajax.readyState === 4 && peticionajax.status === 200){

                try {
                    const respuesta = JSON.parse(peticionajax.responseText);
                        if (respuesta.status === 'success'){
                            
                            window.location.href = '../pages/login.html';

                        } else {

                            mensaje.innerHTML = 'Error, el usuario o la contraseña son incorrectos.';

                        }
                

                } catch (error){

                    mensaje.innerHTML = 'Respuesta errónea desde el servidor.';

                }

            }

        };
            peticionajax.send(datosform);

    })

    
})