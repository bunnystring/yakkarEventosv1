<?php
$controller = ucwords($controller); //Funcion para convertir la primera letra en mayuscula
$controllerFile = "Controllers/".$controller. ".php";
if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller(); //TODO: instanciar 
    if (method_exists($controller, $method)) { //TODO: Existe el methodo
        $controller->{$method}($params); //TODO: Utilizar el metodo y enviar parametros si es que se tiene por medio de la url
    }else{
        require_once("Controllers/Error.php"); //TODO: Cuando no encuentra las rutas se cargara controlador Error 404
    }
}else {
    require_once("Controllers/Error.php");//TODO: Cuando no encuentra las rutas se cargara controlador Error 404
}

?>