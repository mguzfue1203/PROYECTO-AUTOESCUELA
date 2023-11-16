document.addEventListener('DOMContentLoaded', function () {
    //--DECLARACIÓN DE VARIABLES------------------------------------
   
    var cuerpotabla = document.querySelector('.tablaexamen tbody');

    //--------------------------------------
    
    //--FUNCIONES------------------------------------

    


    //--------------------------------------


    function pintarconjuntoexamenes() {

        fetch('../Api/examen/solicitaexamen.php', {

            method: 'GET',
            headers: {"content-type": "application/json;charset=UTF-8"}

        })
        .then(response => {
            
            if (!response.ok) {

                throw new Error('La conexión no ha ido bien. Revisa la API.');

            }
            return response.json(); 
        })
        .then(data => {
            
            data.forEach(examen => {
                pintarexamenes(examen);
            });
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
    }
    

    function pintarCuadrado(examen) {
        






       
    }
      





    //--------------------------------------










    //--------------------------------------






})