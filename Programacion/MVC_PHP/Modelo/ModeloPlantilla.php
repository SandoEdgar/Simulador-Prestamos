<?php 
	require_once "conexion.php";

	Class mdlDatos extends Conexion{

		public function registroDatosModel($datosModel,$tabla){
			$stmt=Conexion::ConectarBD()->prepare("INSERT INTO $tabla(tipo_prestamo,cantidad,tipo_moneda,tiempo,tasa,tipo_tasa,codigo_prestamo_cliente) VALUES (:tipo_prestamo,:cantidad,:tipo_moneda,:tiempo,:tasa,:tipo_tasa,:codigo_prestamo_cliente)");
			
			$stmt->bindParam(":tipo_prestamo",$datosModel["tipo_prestamo"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad",$datosModel["cantidad"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_moneda",$datosModel["tipo_moneda"], PDO::PARAM_STR);
			$stmt->bindParam(":tiempo",$datosModel["tiempo"], PDO::PARAM_INT);
			$stmt->bindParam(":tasa",$datosModel["tasa"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_tasa",$datosModel["tipo_tasa"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo_prestamo_cliente",$datosModel["codigo_prestamo_cliente"],PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}


		public function selectDatosModel ($tabla,$id){

			$stmt = Conexion::ConectarBD()->prepare("SELECT * FROM $tabla where codigo_prestamo_cliente = :id");
			$stmt -> bindParam(":id",$id,PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt->fetch();

		}
	}