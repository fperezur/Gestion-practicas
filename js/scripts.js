function reordenar_empresas(){
    var button = document.getElementById("cabecera_nombre");

    var order = button.dataset.order;

    var ajax_url = "http://localhost:8080/Gestion-practicas/reordenar_empresas.php";
          // Creamos un nuevo objeto encargado de la comunicación
          var ajax_request = new XMLHttpRequest();

          // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
          ajax_request.onreadystatechange = function() {

              // si el readyState es 4, proseguir
              if (ajax_request.readyState == 4 ) {

                  // Analizaos el responseText que contendrá el JSON enviado desde el servidor
                  var response = ajax_request.responseText;
                  document.getElementById("tbody_empresas").innerHTML = response;
              }
           }
           
           // Definimos como queremos realizar la comunicación
           ajax_request.open( "GET", ajax_url + "?order=" + order );
           
           //Enviamos la solictud con los parámetros que habíamos definido
           ajax_request.send();

           if(order == "ASC"){
                button.dataset.order = "DESC";
                document.getElementById("flecha_arriba").style.display = "none";
                document.getElementById("flecha_abajo").style.display = "inline";
           }
           else{
            button.dataset.order = "ASC";
            document.getElementById("flecha_arriba").style.display = "inline";
            document.getElementById("flecha_abajo").style.display = "none";
           }

           
}

function reordenar_alumnos(){
    var button = document.getElementById("cabecera_nombre");

    var order = button.dataset.order;

    var ajax_url = "http://localhost:8080/Gestion-practicas/reordenar_alumnos.php";
          // Creamos un nuevo objeto encargado de la comunicación
          var ajax_request = new XMLHttpRequest();

          // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
          ajax_request.onreadystatechange = function() {

              // si el readyState es 4, proseguir
              if (ajax_request.readyState == 4 ) {

                  // Analizaos el responseText que contendrá el JSON enviado desde el servidor
                  var response = ajax_request.responseText;
                  document.getElementById("tbody_empresas").innerHTML = response;
              }
           }
           
           // Definimos como queremos realizar la comunicación
           ajax_request.open( "GET", ajax_url + "?order=" + order );
           
           //Enviamos la solictud con los parámetros que habíamos definido
           ajax_request.send();

           if(order == "ASC"){
                button.dataset.order = "DESC";
                document.getElementById("flecha_arriba").style.display = "none";
                document.getElementById("flecha_abajo").style.display = "inline";
           }
           else{
            button.dataset.order = "ASC";
            document.getElementById("flecha_arriba").style.display = "inline";
            document.getElementById("flecha_abajo").style.display = "none";
           }

           
}

function filtrar_empresas(){
    var filtro = document.getElementById("filtro").value;
    var ajax_url = "http://localhost:8080/Gestion-practicas/filtrar_empresas.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar_alumnos(){
    var filtro = document.getElementById("filtro").value;
    var ajax_url = "http://localhost:8080/Gestion-practicas/filtrar_alumnos.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function leer_tutor(){
    
    empresa_seleccionada = document.getElementById("empresa_asociada").value;
    if(empresa_seleccionada != ""){

        document.getElementById("fechas_practicas").style.display = "flex";
    var ajax_url = "http://localhost:8080/Gestion-practicas/leer_tutor.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tutor_empresa").value = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_empresa=" + empresa_seleccionada );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

    }
    else{
        document.getElementById("tutor_empresa").value = "";
        document.getElementById("fechas_practicas").style.display = "none";

    }


}

// function that deletes a company
function borrar_empresa(id_empresa){
    var ajax_url = "http://localhost:8080/Gestion-practicas/delete_empresa.php";
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            //document.getElementById("tbody_empresas").innerHTML = response;
            window.location="empresas.php";
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_empresa=" + id_empresa );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

   

}

// function that deletes an alumn
function borrar_alumno(id_alumno){
    var ajax_url = "http://localhost:8080/Gestion-practicas/delete_alumno.php";
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            //document.getElementById("tbody_empresas").innerHTML = response;
            window.location="alumnos.php";
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_alumno=" + id_alumno );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

   

}