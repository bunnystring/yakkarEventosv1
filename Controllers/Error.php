<?php 

    class Errors extends Controllers{
       public function __construct() 
       {
        parent::__construct(); //TODO: ejecutando el metodo constructor de la clase que se esta heredando
       }
       public function notFound()
       {
        $this->views->getView($this,"error"); //TODO: Pasar la vista
       }
    }

    $notFound = new Errors();
    $notFound->notFound();
?>