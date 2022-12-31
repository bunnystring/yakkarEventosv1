<?php
    class Logout
    {
        public function __construct() 
        {
            session_start(); //Inicializando sesion
            session_unset(); //Limpiamos varaibles de sesion
            session_destroy(); //Destruir las variables de sesion
            header('location:'.base_url().'login');
        }
    }
?>