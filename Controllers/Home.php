<?php 

    class Home extends Controllers{
       public function __construct() 
       {
        parent::__construct(); //TODO: ejecutando el metodo constructor de la clase que se esta heredando
       }
       public function home()
       {
        $data['page_id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "Página Principal";
        $data['page_name'] = "home";
        $data['page_content'] = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat alias 
             iusto perferendis quasi dolorem tenetur a officia recusandae corporis magni! Aperiam,
             id voluptas veritatis obcaecati vero quisquam aspernatur ipsa illo.";
        $this->views->getView($this,"home",$data); //TODO: Pasar la vista
       }
    }

  ?>
