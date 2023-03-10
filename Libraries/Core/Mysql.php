<?php
    class Mysql extends Conexion
    {
        private  $conexion;
        private $strquery;
        private $arrValues;

        function __construct() {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect(); //Invocar nethod conect que esta en la clase Conexion
        }
        /** Insertar un Registro **/
        public function insert(string $query, array $arrValues)
        {
            $this->strquery = $query;
            $this->arrVAlues = $arrValues;

            $insert = $this->conexion->prepare($this->strquery);
            $resInsert = $insert->execute($this->arrVAlues); //Array 1 
            if ($resInsert)
            {
                $lastInsert = $this->conexion->lastInsertId();
            }else{
                $lastInsert = 0;
            }
            return $lastInsert;
        }
        /** Buscar un Registro **/
        public function select(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        /*** Devuelve todos los Registros  ***/
        public function select_all(string $query)
        {
            $this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetchall(PDO::FETCH_ASSOC);
        	return $data;
        }
        /*** Actualiza los Registros ***/
        public function update(string $query, array $arrValues)
        {
            $this->strquery = $query;
            $this->arrVAlues = $arrValues;
            $update = $this->conexion->prepare($this->strquery);
            $resExecute = $update->execute($this->arrVAlues);
            return $resExecute;
        }
        /*** Eliminar un Registro ***/
        public function delete(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $del = $result->execute();
            return $del;
        }
    }
?>