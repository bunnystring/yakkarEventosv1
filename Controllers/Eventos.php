<?php 

    class Eventos extends Controllers{
       public function __construct() 
       {
        parent::__construct(); //TODO: ejecutando el metodo constructor de la clase que se esta heredando
       }
       public function eventos()
       {
        $data['page_id'] = 2;
        $data['page_tag'] = "Eventos";
        $data['page_title'] = "Eventos Disponibles";
        $data['page_name'] = "Eventos";
        $this->views->getView($this,"eventos",$data); //TODO: Pasar la vista
       }
    }

  ?>
