<?php

    $errores = [];
    $coeficiente1;
    $coeficiente2;
    $coeficiente3;

    function mostrarError($errores, $campo){

        $alerta = "";

        if(isset($errores[$campo]) && !empty($campo)){

            $alerta = '<div class="alert alert-danger">'.$errores[$campo].'</div>';

        }

        return $alerta;

    }

    function validez($errores){

        if(isset($_POST["submit"]) && count($errores) == 0){

            return '<div class="alert alert-success">Raíz cuadrada realizada correctamente</div>';

        }

    }

    function filtrado($datos){

        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);

        return $datos;

    }

    function calculaRaiz(){

        $tabla = array();

        global $coeficiente1;
        global $coeficiente2;
        global $coeficiente3;

        $polinomio = "$coeficiente1 x^2 + $coeficiente2 x + $coeficiente3 = 0";

        $disc = pow($coeficiente2, 2) - (4 * $coeficiente1 * $coeficiente3);

        if($disc < 0){

            $resultado = "No existen raíces reales :(";

        }else if ($disc == 0){

            $resultado = "X1 = X2 = ".-$coeficiente2 / (2 * $coeficiente1);

        }else if ($disc > 0){

            $resultado = "X1 = ".(-$coeficiente2 + sqrt($disc)) / (2 * $coeficiente1)." || X2 = ".(-$coeficiente2 - sqrt($disc)) / (2 * $coeficiente1);

        }

        array_push($tabla, $coeficiente1, $coeficiente2, $coeficiente3, $polinomio, $resultado);

        include 'includes/tabla.php';

    }

     
    if(isset($_POST["submit"])){
        
        if(!empty($_POST["coeficiente1"]) && isset($_POST["coeficiente1"]) && is_numeric($_POST["coeficiente1"])){

            $coeficiente1 = filtrado($_POST["coeficiente1"]);
            $coeficiente1 = filter_var($coeficiente1, FILTER_SANITIZE_NUMBER_INT);

        }else{

            $errores["coeficiente1"] = "El coeficiente A no puede estar vacío y debe ser un número";

        }

    }

    if(isset($_POST["submit"])){
        
        if(!empty($_POST["coeficiente2"]) && isset($_POST["coeficiente2"]) && is_numeric($_POST["coeficiente2"])){

            $coeficiente2 = filtrado($_POST["coeficiente2"]);
            $coeficiente2 = filter_var($coeficiente2, FILTER_SANITIZE_NUMBER_INT);

        }else{

            $errores["coeficiente2"] = "El coeficiente B no puede estar vacío y debe ser un número";

        }

    }

    if(isset($_POST["submit"])){
        
        if(!empty($_POST["coeficiente3"]) && isset($_POST["coeficiente3"]) && is_numeric($_POST["coeficiente3"])){

            $coeficiente3 = filtrado($_POST["coeficiente3"]);
            $coeficiente3 = filter_var($coeficiente3, FILTER_SANITIZE_NUMBER_INT);

        }else{

            $errores["coeficiente3"] = "El coeficiente C no puede estar vacío y debe ser un número";

        }

    }

?>
