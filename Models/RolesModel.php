<?php 

    class RolesModel extends Mysql
    {
        public $intIdrol;
        public $strRol;
        public $strDescripcion;
        public $intStatus;

        public function __construct() 
        {
            parent::__construct();
           // echo "mensaje desde el modelo roles";
        }
              /** Traer los cargos **/
        public function selectRoles()
        {
            //TODO: Traer todos los roles
           $sql = "SELECT * FROM cargos WHERE status != 0";
           $request = $this->select_all($sql);
           return $request;
        }
        public function selectRol(int $idrol)
        {
            //TODO: Buscar un role
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM cargos WHERE idrol = $this->intIdrol";
            $request = $this->select($sql);
            return $request;
        }
        public function insertRol(string $rol, string $descripcion, int $status)
        {
            $return = "";
            $this->strRol = $rol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM cargos WHERE nombrerol = '{$this->strRol}'";
            $request = $this->select_all($sql);

            if (empty($request))
            {
                $query_insert = "INSERT INTO cargos(nombrerol,descripcion,status) VALUES (?,?,?)";
                $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }

        public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
        {
            $this->intIdrol = $idrol;
            $this->strRol = $rol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;
            /**Si el nombre del rol es igual al nombre que enviamos y el id es diferente detecta un error*/
            $sql = "SELECT * FROM cargos WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
            $request = $this->select_all($sql);

            if (empty($request)) 
            {
                $sql = "UPDATE cargos SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol";
                $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
                $request = $this->update($sql, $arrData);    
            }else{
                $request = "exist";
            }
            return $request;
        }
        public function deleteRol(int $idrol)
        {
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM empleado WHERE cargo_fk = $this->intIdrol";
            $request = $this->select_all($sql);
            if(empty($request))
            {
            //   $sql = "DELETE FROM cargos WHERE idrol = $this->intIdrol"; Eliminar
              $sql = "UPDATE cargos SET status = ? WHERE idrol = $this->intIdrol";  
              $arrData = array(0);
              $request = $this->update($sql, $arrData);
              if ($request) 
              {
                $request = 'ok';
              }else
              {
                $request = 'error';
              }
            }else
            {
                $request = 'exist';
            }  
            return $request;
        }
        
    }

?>
