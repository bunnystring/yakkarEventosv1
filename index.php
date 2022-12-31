<?php
require_once("Config/Config.php");
require_once("Helpers/Helpers.php");
 $url =  !empty($_GET['url']) ? $_GET['url'] : 'home/home';

$arrUrl = explode("/", $url); //separar cuando encuentre el dleimitador /
$controller = $arrUrl[0];  // El controlador va hacer lo que venga en la posicion 0;
$method = $arrUrl[0];//TODO: controlador existe es [0] metodo tambien sera [0] ejemplo controlador home, metodo : home
$params = "";

if (!empty($arrUrl[1])) { 
    if ($arrUrl[1] != "") {//TODO si en la posicion 1 viene un dato el metodo tendra ese mismo dato y la url sera la misma
      $method = $arrUrl[1];
    }
}
if (!empty($arrUrl[2])) { //TODO: si existe la posicion 2 en la url quiere decir que si vienen parametros
    if ($arrUrl[2] != "") {
        for ($i=2; $i < count($arrUrl); $i++) { 
            $params .= $arrUrl[$i].',';
        }
        $params = trim($params, ',');//TODO: remover el ultimo caracter d euna cadena
  
    }
}

//** Funcion para cargar las clases de forma automatica */
require_once("Libraries/Core/Autoload.php");
//Core Load
require_once("Libraries/Core/Load.php");



// echo '<br>';
// echo "controlador: ". $controller;
// echo '<br>';
// echo  'methodo:' . $method;
// echo "<br>";
// echo "Parametros: ". $params;


?>