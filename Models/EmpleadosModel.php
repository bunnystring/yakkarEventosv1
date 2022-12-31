<?php 

    class EmpleadosModel extends Mysql
    {
        private $intIdEmpleado;
        private $strNombre;
        private $strIdentificacion;
        private $strEmail;
        private $intCelular;
        private $intTipoId;
        private $strUsuario;
        private $strClave;
        private $strToken;
        private $strStatus;
        private $strFecha;
        

        public function __construct() 
        {
            parent::__construct();
           // echo "mensaje desde el modelo home";
        }
        public function insertEmpleado(string $nombre, int $identificacion, 
        string $email, int $celular, int $tipoid, string $usuario, string $clave,
        int $status)
        {
            $this->strNombre = $nombre;
            $this->strIdentificacion = $identificacion;
            $this->strEmail = $email;
            $this->intCelular = $celular;
            $this->intTipoId = $tipoid;
            $this->strUsuario = $usuario;
            $this->strClave = $clave;
            $this->strStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM empleado WHERE
                    email = '{$this->strEmail}' or identificacion = $this->strIdentificacion";
            $request = $this->select_all($sql);  
            
            if (empty($request)) 
            {
                $query_insert = "INSERT INTO empleado(
                    nombre,identificacion,email,celular,cargo_fk,usuario,clave,estado)
                    VALUES(?,?,?,?,?,?,?,?)";
                $arrData = array($this->strNombre,
                                $this->strIdentificacion,
                                $this->strEmail,
                                $this->intCelular,
                                $this->intTipoId,
                                $this->strUsuario,
                                $this->strClave,
                                $this->strStatus );
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else
            {
                $return = "exist";
            }
            return $return;
        }
        public function selectEmpleados()
        {
            $sql = "SELECT e.id_empleado,e.nombre,e.identificacion,e.email,e.celular,e.cargo_fk,e.usuario,e.clave,e.token,e.estado,e.fecha_registro,
            c.nombrerol
            FROM empleado e
            INNER JOIN cargos c
            ON e.cargo_fk = c.idrol
            WHERE e.estado != 0";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectEmpleado(int $idempleado)
        {
            $this->intIdEmpleado = $idempleado;
            $sql = "SELECT e.id_empleado,e.nombre,e.identificacion,e.email,e.celular,e.usuario,e.clave,e.cargo_fk,e.token,e.estado,c.nombrerol,
            DATE_FORMAT(e.fecha_registro, '%d-%m-%Y') as fecharegistro
            FROM empleado e
            INNER JOIN cargos c
            ON e.cargo_fk = c.idrol
            WHERE e.id_empleado = $this->intIdEmpleado";
            // echo $sql;exit;
            $request = $this->select($sql);
            return $request;
        }
        public function updateEmpleado(int $idEmpleado, string $nombre, int $identificacion, string $email, int $celular,
        int $tipoid, string $usuario, string $clave, int $status)
        {
            $this->intIdEmpleado = $idEmpleado;
            $this->strNombre = $nombre;
            $this->strIdentificacion = $identificacion;
            $this->strEmail = $email;
            $this->intCelular = $celular;
            $this->intTipoId = $tipoid;
            $this->strUsuario = $usuario;
            $this->strClave = $clave;
            $this->strStatus = $status;
            //TODO : se valida que la identificacion no exista ni que exista otro email con otro id de empleado
            $sql = "SELECT * FROM empleado WHERE(email = '{$this->strEmail}' AND id_empleado != 
            $this->intIdEmpleado) OR (identificacion = '{$this->strIdentificacion}' AND id_empleado  !=  $this->intIdEmpleado)";

            $request = $this->select_all($sql);
                    //TODO: Verficar si no existe                   
            if (empty($request)) 
            {
                if ($this->strClave != "") 
                {
                    $sql = "UPDATE empleado SET nombre=?, identificacion=?, email=?, celular=?, cargo_fk=?, usuario=?, clave=?, estado=?
                            WHERE id_empleado = $this->intIdEmpleado";
                    $arrData = array($this->strNombre,
                                        $this->strIdentificacion,
                                        $this->strEmail,
                                        $this->intCelular,
                                        $this->intTipoId,
                                        $this->strUsuario,
                                        $this->strClave,
                                        $this->strStatus);         
                }else
                {
                    $sql = "UPDATE empleado SET nombre=?, identificacion=?, email=?, celular=?, cargo_fk=?, usuario=?, estado=?
                            WHERE id_empleado = $this->intIdEmpleado";
                    $arrData = array($this->strNombre,
                                        $this->strIdentificacion,
                                        $this->strEmail,
                                        $this->intCelular,
                                        $this->intTipoId,
                                        $this->strUsuario,
                                        $this->strStatus);    
                }
                $request = $this->update($sql,$arrData);
            }else
            {
                $request = "exist";
            }
            return $request;
        }
        public function deleteEmpleado(int $idtipoempleado)
        {
            $this->intIdEmpleado = $idtipoempleado;
            // $sql = "DELETE FROM empleado WHERE id_empleado = $this->intIdEmpleado"; 
            $sql = "UPDATE empleado SET estado = ? WHERE id_empleado = $this->intIdEmpleado"; //TODO: Setear el valor
            $arrData = array(0); //TODO: Valor que se le asignara a el campo estado
            $request = $this->update($sql,$arrData);
            return $request;
        }
    }

?>
