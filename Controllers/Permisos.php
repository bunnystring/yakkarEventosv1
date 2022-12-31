<?php 

    class Permisos extends Controllers{
       public function __construct() 
       {
        parent::__construct(); //TODO: ejecutando el metodo constructor de la clase que se esta heredando
       }

       public function getPermisosRol(int $idrol)
       {
        $rolid = intval($idrol);
        if ($rolid > 0) {
            $arrModulos = $this->model->selectModulos();
            $arrPermisosRol = $this->model->selectPermisosRol($rolid);
            $arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
            $arrPermisoRol = array('idrol' => $rolid);

            if (empty($arrPermisosRol)) 
            {
                for ($i=0; $i < count($arrModulos); $i++)  //Llegara hasta la cantidad de elementos que tiene el array Modulos Iniciando desde posicion 0
                { 
                    $arrModulos[$i]['permisos'] = $arrPermisos;
                }
            }else{
                for ($i=0; $i < count($arrModulos); $i++) { 
                    $arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);    
                    if (isset($arrPermisosRol[$i])) {
                       //TODO: en cada uno de los elementos asignamos como valor lo que va tener en su posicion del ciclo que esta recorriendo
                    $arrPermisos = array('r' => $arrPermisosRol[$i]['r'],
                    'w' => $arrPermisosRol[$i]['w'],
                    'u' => $arrPermisosRol[$i]['u'],
                    'd' => $arrPermisosRol[$i]['d'] 
                    );
                    }
                    $arrModulos[$i]['permisos'] = $arrPermisos;
                                    
                }
            }
            $arrPermisoRol['modulos'] = $arrModulos;
            $html = getModal("modalPermisos",$arrPermisoRol);
            // dep($arrPermisoRol);
        }
        die();
       }
       public function setPermisos()
       {
        if ($_POST) //TODO enviamos informacion
        {
            $intIdrol = intval($_POST['idrol']);  //TODO convertir a un entero lo que viene en el method Post  
            $modulos = $_POST['modulos']; //TODO variable = modulos que corresponde al array que se esta enviando

            $this->model->deletePermisos($intIdrol); //TODO creamos metodo en el modelo 
            foreach ($modulos as $modulo) 
            {
                $idModulo = $modulo['idmodulo'];
                $r = empty($modulo['r']) ? 0 : 1; //Verificando si el elemento fue enviado si nof ue enviado se colocara un 0 
                $w = empty($modulo['w']) ? 0 : 1;
                $u = empty($modulo['u']) ? 0 : 1;
                $d = empty($modulo['d']) ? 0 : 1;
                $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
            }
            if ($requestPermiso > 0) 
            {
               $arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
            }else
            {
                $arrResponse = array('status' => false, 'msg' => 'No es posible asignar los permisos.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); //TODO: retornamos el array en formato JSON
        }
        die();
       }
    }

  ?>
