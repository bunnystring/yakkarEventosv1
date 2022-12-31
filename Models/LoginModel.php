<?php 

    class LoginModel extends Mysql
    {
        private $intIdEmpleado;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct() 
        {
            parent::__construct();
    
        }
        public function loginUser(string $usuario, string $clave)
        {
            $this->strUsuario = $usuario;
            $this->strClave = $clave;
            $sql = "SELECT id_empleado,estado FROM empleado WHERE
            email = '$this->strUsuario' and 
            clave = '$this->strClave' and
            estado !=0";
           
            $request = $this->select($sql);
            return $request;
        }
        public function sessionLogin(int $iduser)
        {
            $this->intIdEmpleado = $iduser;
            //TODO: Buscar Rol
            $sql = "SELECT e.id_empleado,
                            e.nombre,
                            e.identificacion,
                            e.email,
                            e.celular,
                            e.cargo_fk,
                            c.idrol,c.nombrerol,
                            e.usuario,
                            e.estado
                    FROM empleado e
                    INNER JOIN cargos c
                    ON e.cargo_fk = c.idrol
                    WHERE e.id_empleado = $this->intIdEmpleado";
            $request = $this->select($sql);
            return $request;
        }
        public function getUserEmail(string $strEmail)
        {
            $this->strUsuario = $strEmail;
            $sql = "SELECT id_empleado,nombre,usuario,estado FROM empleado WHERE
            email = '$this->strUsuario' and
            estado = 1 ";
            $request = $this->select($sql);
            return $request;
        }

        public function setTokenUser(int $idempleado, string $token)
        {
           $this->intIdEmpleado = $idempleado;
           $this->strToken = $token;
           $sql = "UPDATE empleado SET token = ? WHERE id_empleado = $this->intIdEmpleado";
           $arrData = array($this->strToken);
           $request = $this->update($sql,$arrData);
           return $request;
        }
        public function getEmpleado(string $email, string $token)
        {
            $this->strUsuario = $email;
            $this->strToken = $token;
            $sql = "SELECT id_empleado FROM empleado WHERE 
                email = '$this->strUsuario' and
                token = '$this->strToken' and
                estado = 1";
            $request = $this->select($sql);
            return $request;
        }
        public function insertPassword(int $idEmpleado, string $clave)
        {
           $this->intIdEmpleado = $idEmpleado;
           $this->strPassword = $clave;
           $sql = "UPDATE empleado SET clave = ?, token = ? WHERE id_empleado = $this->intIdEmpleado";
           $arrData = array($this->strPassword,"");
           $request = $this->update($sql,$arrData);
           return $request;
        }
    }



?>
