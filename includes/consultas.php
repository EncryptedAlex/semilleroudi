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

		/* seleccionar lista de registros segun condicion*/

		public function seleccionar_segun($tabla, $campo, $dato){
			$sql="select * from $tabla where $campo = :dato";
			$sentencia=$this->conn_db->prepare($sql);			
			$sentencia->execute(array('dato'=>$dato));
			$resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
			$sentencia->closeCursor();
			return $resultados;
			$this->conexion_bd=null;
		}

		/* seleccionar un registro que segun condicion */
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

		/* registro de datos*/
		public function guardar($tabla,$datos){
			$rows   = 0;
			$campos = "";	
			$pines = "";
			$contador=count($datos);
    		foreach ($datos as $campo => $value){
				$campos.="$campo";
				$pines.=":$campo";			   
			   	$rows++;
			  	if($rows<$contador){
			   		$campos.=",";
					$pines.=",";
			    }
			}					  
			$query_save="Insert into $tabla($campos) value($pines)";
			$guardar=$this->conn_db->prepare($query_save);
    		foreach($datos as $campo => $value){
    			$guardar->bindParam(':campo', $value);    			 	
			}						
			$guardar->execute($datos);
			$result = $this->conn_db->lastInsertId();
			$guardar->closeCursor();
			return $result;
			$this->conexion_bd=null;			
		}
		/* actualizar registro */
		public function modificar($parametros,$datos){
			$tabla = $parametros['tabla'];
			$campo = $parametros['campo'];
			$id = $parametros['id'];												
			foreach ($datos as $campos => $var){
				$query_modify="update $tabla set $campos = :$campos where $campo = :id";
				$modificar=$this->conn_db->prepare($query_modify);			
				$temporal = array("$campos"=>$var,'id'=>$id); 
				$modificar->execute($temporal);				
			}						
			$result =1;
			$modificar->closeCursor();
			return $result;
			$this->conexion_bd=null;				
		}				
}	
?>
