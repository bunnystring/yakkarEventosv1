<?php

    class Views 
    {
        public function getView($controller, $view,$data="")
        {   
            $controller = get_class($controller);
            if ($controller == "Home") {
                $view = "Views/".$view.".php"; //TODO: Armando la ruta para encontrar la vista
            }else{
                $view = "Views/".$controller."/".$view.".php"; //TODO si esta vista no se encuentra quiere decir que es otro controlador
            }
            require_once($view);
        }
    }

?>