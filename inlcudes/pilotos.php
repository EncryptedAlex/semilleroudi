<?php
    require ('conn.php');
	class siont extends conectarDB{		
		public function siont(){				
			parent::__construct();
		}
		/* listar registros*/
		public function listar($tabla){
				$sql="select * from $tabla";				
				$sentencia=$this->conn_db->prepare($sql);						
				$sentencia->execute();			
				$resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);			
				$sentencia->closeCursor();
				return $resultados;
				$this->conexion_bd=null;			
		}
		/* seleccionar un dato */
		public function seleccionar($tabla, $campo, $valor){
			$arreglo = array('campo'=>$dato);
			$sql="select * from $tabla where $campo = :campo";
			$sentencia = $this->conn_db->prepare($sql);			
			$sentencia->execute($arreglo);
			$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
			$sentencia->closeCursor();
			return $resultados;
			$this->conexion_bd = null;
		}
		crear / uodate / delete   
}	
?>
