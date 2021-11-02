<?php

    $errores = [];
    $nif = "";
    $nombre = "";
    $apellidos = "";
    $fecha = "";
    $email = "";
    $password = "";

    function mostrarError($errores, $campo){

        $alerta = "";

        if(isset($errores[$campo]) && !empty($campo)){

            $alerta = '<div class="alert alert-danger">'.$errores[$campo].'</div>';

        }

        return $alerta;

    }

    function validez($errores){

        if(isset($_POST["submit"]) && count($errores) == 0){

            return '<div class="alert alert-success">Formulario validado correctamente</div>';

        }

    }

    function filtrado($datos){

        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);

        return $datos;

    }

    function muestraFormulario(){

        $tabla = array();

        global $nif;
        global $nombre;
        global $apellidos;
        global $fecha;
        global $email;
        global $password;

        array_push($tabla, $nif, $nombre, $apellidos, $fecha, $email, $password);

        include 'includes/tabla.php';

    }

     
    if(isset($_POST["submit"])){
        
        if(!empty($_POST["nif"]) && preg_match("/[\d]{8}[a-zA-Z]{1}/", $_POST["nif"])){

            $nif = filtrado($_POST["nif"]);
            $nif = filter_var($nif, FILTER_SANITIZE_STRING);

        }else{

            $errores["nif"] = "Un NIF válido contiene 8 dígitos y una letra (minúscula o mayúscula)";

        }

        if(!empty($_POST["nombre"]) && strlen($_POST["nombre"]) <= 15 && !preg_match("/[\d]/", $_POST["nombre"])){

            $nombre = filtrado($_POST["nombre"]);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

        }else{

            $errores["nombre"] = "Un nombre no puede estar vacío, tener más de 15 caracteres ni contener números";

        }
        
        if(!empty($_POST["apellidos"]) && strlen($_POST["apellidos"]) <= 20 && !preg_match("/[\d]/", $_POST["apellidos"])){

            $apellidos = filtrado($_POST["apellidos"]);
            $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);

        }else{

            $errores["apellidos"] = "Un apellido no puede estar vacío, tener más de 20 caracteres ni contener números";

        }

        if(!empty($_POST["fecha"])
            && preg_match("/((0[1-9]|[1-2][\d]|3[0-1])\/(01|03|05|07|08|10|12)\/(1[\d]{3}|20[1-2][0-1])|(0[1-9]|[1-2][\d]|30)\/(04|06|09|11)\/(1[\d]{3}|20[1-2][0-1])|(0[1-9]|[1-2][\d])\/(02)\/(1[\d]{3}|20[1-2][0-1]))/"
            , $_POST["fecha"])){

            $fecha = filtrado($_POST["fecha"]);
            $fecha = filter_var($fecha, FILTER_SANITIZE_STRING);

        }else{

            $errores["fecha"] = "La fecha debe ser real, con formato dd/mm/yyyy y estar comprendida entre el año 1000 y el 2021";

        }
        
        if(!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

            //preg_match("/[a-z]{7}[\d]{3}@g.educaand.es/", $_POST["email"])

            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        }else{

            $errores["email"] = "El e-mail no es válido";

        }
        
        if(!empty($_POST["password"]) && preg_match("/(?=.+[a-z])(?=.+[A-Z])(?=.+\d)(?=.+\W)[a-zA-Z\d\W]{6,}/", $_POST["password"])){

            $password = sha1($_POST["password"]);

        }else{

            $errores["password"] = "La contraseña debe contener al menos 6 caracteres y ser segura";

        }

    }

?>
