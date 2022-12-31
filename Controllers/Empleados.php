<?php 

    class Empleados extends Controllers{
       public function __construct() 
       {
         session_start();
         //TODO: Utilizamos la variable de session login que se encuentra en el controlador de login y validamos si viene verdadera
         if (empty($_SESSION['login'])) {
            header('Location:'.base_url().'login');
         }
        parent::__construct(); //TODO: ejecutando el metodo constructor de la clase que se esta heredando
        getPermisos(2); //TODO; Extraer los permisos de este modulo
       }
       public function Empleados()
       {
        $read = $_SESSION["permisoMod"]['r']; 
        if ($read == 0) {
         header('Location:'.base_url().'dashboard');
        }
        $data['page_tag'] = "Empleados";
        $data['page_title'] = "EMPLEADOS <small>Yakkar Eventos</small>";
        $data['page_name'] = "empleados";
        $data['page_functions_js'] = "functions_empleados.js";
        $this->views->getView($this,"empleados",$data); //TODO: Pasar la vista
       }
       public function setEmpleado()
       {
         if ($_POST) 
         {
            // dep($_POST);
            // die();
            if (empty($_POST['txtNombre'])  || empty($_POST['txtIdentificacion']) || empty($_POST['txtEmail']) 
               || empty($_POST['listRolid']) || empty($_POST['txtCelular']) || empty($_POST['listStatus']) 
               || empty($_POST['txtUsuario'])) 
            {
               $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else
            {  
               $idEmpleado = intval($_POST['idEmpleado']);  //TODO: traer lo que viene en el elemento input $idEmpleado
               $strNombre = ucwords(strClean($_POST['txtNombre'])); //TODO: Convertir a mayuscula la primera letra de cada palabra
               $strIdentificacion = intval($_POST['txtIdentificacion']); //TODO: Convertir a un entero lo que venga
               $strEmail = strtolower(strClean($_POST['txtEmail'])); //TODO: strlower Convertir todas las letras en minusculas
               $intCelular = intval(strClean($_POST['txtCelular']));
               $intTipoId =  intval(strClean($_POST['listRolid']));
               $strUsuario = strClean($_POST['txtUsuario']);
               $strClave = strClean($_POST['txtClave']);
               $intStatus = intval(strClean($_POST['listStatus']));

               if ($idEmpleado == 0) 
               {
                 //TODO: Validad si txtclave esta vacio, se genera una contraseña encriptandola usando hash y passGeneratos de los helpers
                  $option = 1;
                  $strClave = empty($_POST['txtClave']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['txtClave']);
                  $request_user = $this->model->insertEmpleado($strNombre,//TODO: Crear Empleado
                                                              $strIdentificacion,
                                                              $strEmail,
                                                              $intCelular,
                                                              $intTipoId,
                                                              $strUsuario,
                                                              $strClave,
                                                              $intStatus);
               }else
               {
                $option = 2;
                $strClave = empty($_POST['txtClave']) ? "" : hash("SHA256",$_POST['txtClave']); //TODO: Si la clave viene vacia no se actualiza de viene lleno se hace el SHA256
                $request_user = $this->model->updateEmpleado($idEmpleado, //TODO: se necesita enviar el id para hacer el update
                                                             $strNombre,//TODO: Crear Empleado
                                                             $strIdentificacion,
                                                             $strEmail,
                                                             $intCelular,
                                                             $intTipoId,
                                                             $strUsuario,
                                                             $strClave,
                                                             $intStatus);
               }
               if($request_user > 0 )
					{
						if($option == 1){
                     if($request_user === 'exist'){
                        $arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
                     }else
                     {
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                     }
							
						}else if($option == 2){
                     if($request_user === 'exist'){
                        $arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
                     }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                     }
                  }
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
         }
         die();  
       }
       public function getEmpleados()
       {
         $arrData = $this->model->selectEmpleados();
         for ($i=0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDelete = '';

				if($arrData[$i]['estado'] == 1)
				{
					$arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
				}
            if ($_SESSION["permisoMod"]['r'] == 1) {
               $btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewEmpleado('.$arrData[$i]['id_empleado'].')" title="Ver Empleado"><i class="far fa-eye"></i></button>';
            }
            if ($_SESSION["permisoMod"]['u'] == 1) {
               $btnEdit = '<button class="btn btn-warning  btn-sm btnEditUsuario" onClick="fntEditEmpleados('.$arrData[$i]['id_empleado'].')" title="Editar Empleado"><i class="fas fa-pencil-alt"></i></button>';
            }
            if ($_SESSION["permisoMod"]['d'] == 1) {
               $btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelEmpleado('.$arrData[$i]['id_empleado'].')" title="Eliminar Empleado"><i class="far fa-trash-alt"></i></button>';
            }
            $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
       }
       public function getEmpleado(int $idempleado)
       {
         $idusuario = intval($idempleado);
         if ($idusuario > 0) 
         {
            $arrData = $this->model->selectEmpleado($idusuario);
            // dep($arrData);
            if (empty($arrData)) 
            {
               $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else
            {
               $arrResponse = array('status' => true, 'data' => $arrData);
            }
            //TODO: devuelvo la informacion pero antes de vuelvo en formato en JSON
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
         }
         die();
       }
       public function delEmpleado()
       {
         if($_POST) {
				$intIdEmpleado = intval($_POST['idEmpleado']);
				$requestDelete = $this->model->deleteEmpleado($intIdEmpleado);
				if ($requestDelete)    
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Empleado');
				}else
				{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Empleado.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die(); //Cierra el proceso
       }
    }

  ?>
