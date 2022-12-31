<?php 

    class Dashboard extends Controllers{
       public function __construct() 
       {
        parent::__construct(); //TODO: ejecutando el metodo constructor de la clase que se esta heredando
            session_start();
            //TODO: Utilizamos la variable de session login que se encuentra en el controlador de login y validamos si viene verdadera
            if (empty($_SESSION['login'])) {
               header('Location:'.base_url().'login');
            }
            getPermisos(1);
       }
       public function dashboard()
       {
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard - Yakkar Eventos";
        $data['page_title'] = "Dashboard - Yakkar Eventos";
        $data['page_name'] = "dashboard";
        $data['page_functions_js'] = "functions_dashboard.js";
        $this->views->getView($this,"dashboard",$data); //TODO: Pasar la vista
       }
    }

  ?>
