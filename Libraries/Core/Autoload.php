<?php
spl_autoload_register(function($class){
    if (file_exists("Libraries/".'Core/'.$class.".php")){ //Existe el archivo
       require_once("Libraries/".'Core/'.$class.".php"); //TODO: Libraries/Core/home.php
    }
});
