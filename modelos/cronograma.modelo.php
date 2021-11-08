<?php

require_once "conexion.php";

class ModeloVehiculo{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarVehiculo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR ,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE VEHICULO
	=============================================*/

	static public function mdlIngresarVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, modelo, marca, placa, tiempo ) VALUES (:nombre, :modelo, :marca, :placa, :tiempo)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);		
				


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	/*=============================================
	EDITAR VEHICULO
	=============================================*/

	static public function mdlEditarVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre , modelo=:modelo, marca=:marca,  tiempo=:tiempo , placa=:placa ,valor_total=:valor_total WHERE id_vehiculo = :id_vehiculo");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":valor_total", $datos["valor_total"], PDO::PARAM_STR);
		$stmt->bindParam(":id_vehiculo" ,$datos["id_vehiculo"],PDO::PARAM_INT);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	
	}

	/*=============================================
	BORRAR VEHICULO
	=============================================*/

	static public function mdlBorrarVehiculo($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM vehiculo WHERE id_vehiculo =:id_vehiculo");

	$stmt -> bindParam(":id_vehiculo", $datos, PDO::PARAM_INT);


	if($stmt -> execute()){

			return "ok";
		
	}else{

			return "error";	

	}

		$stmt -> close();

		$stmt = null;


	}


}

	?>