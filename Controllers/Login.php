<?php 

    class Login extends Controllers{
       public function __construct() 
       {
        parent::__construct(); 
            //TODO: ejecutando el metodo constructor de la clase que se esta heredando
            session_start();
            if (isset($_SESSION['login'])) {
               header('Location:'.base_url().'dashboard');
            }
       }
       public function login()
       {
        
        $data['page_tag'] = "Login - Yakkar Eventos";
        $data['page_title'] = "Login - Yakkar Eventos";
        $data['page_name'] = "login";
        $data['page_functions_js'] = "functions_login.js";
        $this->views->getView($this,"login",$data); //TODO: Pasar la vista
       }
       public function loginUser()
       {
         //  dep($_POST);
         if ($_POST) 
         {
            if (empty($_POST['txtEmail']) || empty($_POST['txtClave'])) {
               $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else
            {
               $strUsuario = strtolower(strClean($_POST['txtEmail']));
               $strClave = hash("SHA256",$_POST['txtClave']);
               //TODO: 
               $requestUser = $this->model->loginUser($strUsuario,$strClave);
               if (empty($requestUser)) 
               {
                  $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña son Incorrectos');
               }else
               {
                  $arrData = $requestUser;
                  if ($arrData['estado'] == 1) 
                  {
                     $_SESSION['idEmpleado'] = $arrData['id_empleado'];
                     $_SESSION['login'] = true;
                     //Crear variable arrData que va hacer igual a lo que nos devuelve el metodo sessionLogin en el modelo
                     $arrData = $this->model->sessionLogin($_SESSION['idEmpleado']);
                     $_SESSION['userData'] = $arrData;
                     $arrResponse = array('status' => true, 'msg' => 'ok');
                  }else
                  {
                     $arrResponse = array('status' => false, 'msg' => 'Este Usuario ha sido Suspendido Comuniquese con su Administrador');
                  }
               }
            }
             //TODO: Retrasar respuesta sleep(5);
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
         }
         die();
       }

       public function resetPass()
       {
         // dep($_POST);
         // die();
         if ($_POST) {
            error_reporting(0);
           if (empty($_POST['txtEmailReset'])) 
           {
               $arrResponse = array('status' => false, 'msg' => 'Error de datos');
           }else
           {
               $token = token();
               $strEmail = strtolower(strClean($_POST['txtEmailReset']));
               $arrData = $this->model->getUserEmail($strEmail);

               if (empty($arrData)) 
               {
                  $arrResponse = array('status' => false, 'msg' => 'Este Correo no se encuentra registrado en el sistema.');
               }else
               {
                  $idempleado = $arrData['id_empleado'];
                  $nombreUsuario = $arrData['nombre'];

                  $url_recovery = base_url().'login/confirmUser/'.$strEmail.'/'.$token;

                    $requestUpdate = $this->model->setTokenUser($idempleado,$token);

                    $dataUsuario = array('nombreUsuario' => $nombreUsuario,
                                          'email' => $strEmail,
                                          'asunto' => 'Recuperar cuenta - '.NOMBRE_REMITENTE,
                                          'url_recovery' => $url_recovery);
                     

                     if ($requestUpdate) 
                     {
                        $endEmail = sendEmail($dataUsuario,'email_cambioClave');
                        if ($endEmail)
                        {
                           $arrResponse = array('status' => true,
                           'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.');  
                        }else
                        {
                           $arrResponse = array('status' => false,
                           'msg' => 'No es posible realizar el envio de correo para cambio de clave. Intenta más tarde.');
                        }
                     }else
                     {
                        $arrResponse = array('status' => false,
                        'msg' => 'No es posible realizar el proceso intenta más tarde.');
                     }
               }
           }
            //TODO: Retraso en devolver respuesta sleep(5);
           echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); 
         }
         die();
       }
       public function confirmUser(string $params)
       {
         if (empty($params)) 
         {
            header('Location:'.base_url());
         }else
         {  //Obtener los params
            $arrParams = explode(',',$params); 
            $strEmail = strClean($arrParams[0]); //TODO: Limpiando data
            $strToken = strClean($arrParams[1]); //TODO: Limpiando data
            // dep($arrParams);
            $arrResponse = $this->model->getEmpleado($strEmail,$strToken); 
            //TODO: Validando que el email y token existan en la bd
            if (empty($arrResponse)) 
            {
               header("Location:".base_url());
            }else
            {
               $data['page_tag'] = "Cambiar Contraseña - Yakkar Eventos";
               $data['page_title'] = "Cambiar Contraseña - Yakkar Eventos";
               $data['page_name'] = "cambiar contraseña";
               $data['id_empleado'] = $arrResponse['id_empleado'];
               $data['email'] = $strEmail;
               $data['token'] = $strToken;
               $data['page_functions_js'] = "functions_resetClave.js";
               // $data['page_functions_js'] = "functions_login.js";
               $this->views->getView($this,"cambiar_clave",$data);
            }           
         }
         die();
       }
       public  function setPassword()
       {
         // dep($_POST);
         // die();
         if (empty($_POST['idEmpleado']) || empty($_POST['txtClave']) || empty($_POST['txtClaveConfirm'])
         || empty($_POST['txtEmail']) || empty($_POST['txtToken'])) 
         {
            $arrResponse = array('status' => false,
                                    'msg' => 'Error de datos');
         }else
         {
            $intIdempleado = intval($_POST['idEmpleado']);
            $strClave = $_POST['txtClave'];
            $strClaveConfirm = $_POST['txtClaveConfirm'];
            $strEmail = strClean($_POST['txtEmail']);
            $strToken = strClean($_POST['txtToken']);

            if ($strClave != $strClaveConfirm) 
            {
               $arrResponse = array('status' => false,
                                    'msg' => 'Las contraseñas no son iguales.');
            }else
            {
               $arrResponseEmpleado = $this->model->getEmpleado($strEmail,$strToken); 
               //TODO: Validando que el email y token existan en la bd
               if (empty($arrResponseEmpleado)) 
               {
                  $arrResponse = array('status' => false,
                                    'msg' => 'Error en sus  datos.');
               }else
               {
                  $strClave = hash("SHA256", $strClave);
                  $requestPass = $this->model->insertPassword($intIdempleado, $strClave);
                  if ($requestPass) 
                  {
                     $arrResponse = array('status' => true,
                                          'msg' => 'Contraseña actualizada con éxito.');
                  }else
                  {
                     $arrResponse = array('status' => false,
                                          'msg' => 'No es posible realizar el proceso, intente más tarde.');
                  }
               }
            }
         }
          //TODO: Retraso en devolver respuesta sleep(5);
         echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
         die();
       }
    }

?>