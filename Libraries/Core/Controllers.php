<?php 

    class Controllers 
    {
        public function __construct() {
            $this->views = new Views();
            $this->loadModel();
        }

        public function loadModel()
        {
            //TODO: HomeModel
            $model = get_class($this)."Model";
            $routClass = "Models/".$model.".php";
            if (file_exists($routClass)) {
                require_once($routClass); //TODO: Si existe homeModels traerlo
                $this->model = new $model();
            }
        }
    }

?>